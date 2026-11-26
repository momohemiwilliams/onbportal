<?php

namespace Tests\Feature;

use App\Models\MemberOnboarding;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class QdopOnboardingWorkflowTest extends TestCase
{
    use DatabaseTransactions;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);
    }

    protected function makePdf(string $name = 'doc.pdf'): UploadedFile
    {
        return UploadedFile::fake()->create($name, 100, 'application/pdf');
    }

    public function test_landing_page_shows_fifteen_requirements_and_buttons()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Q-Depository Onboarding Portal');
        $response->assertSee('Get Started');
        $response->assertSee('Login');
        $response->assertSee('Sign Up');
        $response->assertSee('Participants Onboarding Requirements');
        $response->assertSee('Executed Data Subject Consent Form for all nominated Principal Officers');
        $response->assertSee('Evidence of Current Year SEC Registration Renewal (for SEC regulated entities)');
    }

    public function test_error_pages_render_cleanly()
    {
        $this->get('/non-existent-route-xyz-404')->assertStatus(404)->assertSee('Page Not Found');

        foreach (['401', '403', '404', '419', '429', '500', '503'] as $code) {
            $html = view("errors.{$code}", [
                'exception' => new \Symfony\Component\HttpKernel\Exception\HttpException((int) $code, ''),
            ])->render();
            $this->assertStringContainsString($code, $html);
        }
    }

    public function test_universal_six_step_onboarding_and_internal_approval_flow()
    {
        Mail::fake();

        $externalUser = User::create([
            'name' => 'Test Participant User',
            'email' => 'participant_' . uniqid() . '@example.com',
            'phone' => '08012345678',
            'usertype' => 'external',
            'password' => bcrypt('Password123!'),
        ]);
        $externalUser->email_verified_at = now();
        $externalUser->save();

        // Select Capital Market Operator -> Others (Please indicate)
        $this->actingAs($externalUser)
            ->post(route('external.onboarding.start'), [
                'eligibility_type' => 'Capital Market Operator',
                'eligibility_sub_type' => 'Others (Please indicate)',
                'eligibility_other' => 'Custodian Bank',
            ])
            ->assertRedirect(route('external.onboarding.step1.create'));

        // Step 1: Optional LEI & SWIFT BIC can be blank; required fields must be filled
        $this->actingAs($externalUser)
            ->post(route('external.onboarding.step1.store'), [
                'eligibility_type' => 'Capital Market Operator',
                'eligibility_sub_type' => 'Others (Please indicate)',
                'eligibility_other' => 'Custodian Bank',
                'institution_name' => 'Test Capital Ltd',
                'company_address' => '1 FMDQ Way, Lagos',
                'direct_line' => '08012345678',
                'company_email' => 'info@testcapital.com',
                'company_tax_number' => 'TIN12345',
                'company_reg_number' => 'RC998877',
                'company_reg_date' => '2020-01-15',
                'settlement_bank' => 'Zenith Bank',
                'settlement_bank_account_number' => '1012345678',
            ])
            ->assertSessionHasNoErrors();

        $app = MemberOnboarding::where('user_id', $externalUser->id)->firstOrFail();
        $this->assertEquals(1, (int) $app->max_step_completed);
        $this->assertEquals('Capital Market Operator - Custodian Bank', $app->displayEligibilityType());

        // Progress gating: cannot jump to Step 4 before completing Step 2
        $this->actingAs($externalUser)
            ->get(route('external.onboarding.step4.edit', $app->id))
            ->assertRedirect(route('external.onboarding.step2.edit', $app->id));

        // Step 2: Principal Officers (PO1, PO2, PO4 required; PO3 optional)
        $this->actingAs($externalUser)
            ->post(route('external.onboarding.step2.update', $app->id), [
                'managing_director_name' => 'Jane Doe',
                'managing_director_phone' => '08011111111',
                'managing_director_email' => 'jane@testcapital.com',
                'managing_director_bvn' => '12345678901',
                'managing_director_nin' => '10987654321',
                'means_of_identification1' => $this->makePdf('id1.pdf'),
                'nin_slip1' => $this->makePdf('nin1.pdf'),
                'data_consent1' => $this->makePdf('consent1.pdf'),

                'principal_director_name1' => 'John Smith',
                'principal_director_designation1' => 'Executive Director',
                'principal_director_phone1' => '08022222222',
                'principal_director_email1' => 'john@testcapital.com',
                'principal_director_bvn1' => '22345678901',
                'principal_director_nin1' => '20987654321',
                'means_of_identification2' => $this->makePdf('id2.pdf'),
                'nin_slip2' => $this->makePdf('nin2.pdf'),
                'data_consent2' => $this->makePdf('consent2.pdf'),

                'compliance_director_name' => 'Alice Compliance',
                'compliance_director_phone' => '08044444444',
                'compliance_director_email' => 'compliance@testcapital.com',
                'compliance_director_bvn' => '42345678901',
                'compliance_director_nin' => '40987654321',
                'means_of_identification4' => $this->makePdf('id4.pdf'),
                'nin_slip4' => $this->makePdf('nin4.pdf'),
                'data_consent4' => $this->makePdf('consent4.pdf'),
            ])
            ->assertRedirect(route('external.onboarding.step3.edit', $app->id));

        // Step 3: Correspondence Emails (comma-separated validation)
        $this->actingAs($externalUser)
            ->post(route('external.onboarding.step3.update', $app->id), [
                'general_correspondence_email' => 'gen1@testcapital.com, gen2@testcapital.com',
                'operations_team_email' => 'ops@testcapital.com',
                'other_groups_email' => 'other@testcapital.com',
            ])
            ->assertRedirect(route('external.onboarding.step4.edit', $app->id));

        // Step 4: Company Documents (PDF <= 5MB)
        $this->actingAs($externalUser)
            ->post(route('external.onboarding.step4.update', $app->id), [
                'memorandumand_articles_of_association' => $this->makePdf('memart.pdf'),
                'board_resolution' => $this->makePdf('board.pdf'),
                'certificate_of_incorporation' => $this->makePdf('cac.pdf'),
                'particulars_of_directors' => $this->makePdf('cac7.pdf'),
                'evidence_of_securities_and_exchange_commission' => $this->makePdf('sec.pdf'),
                'evidence_of_sec_renewal' => $this->makePdf('sec_renewal.pdf'),
            ])
            ->assertRedirect(route('external.onboarding.step5.edit', $app->id));

        // Step 5: Signature Mandate & Declaration
        $this->actingAs($externalUser)
            ->post(route('external.onboarding.step5.update', $app->id), [
                'signature_mandate_form' => $this->makePdf('mandate.pdf'),
                'declaration_form' => $this->makePdf('declaration.pdf'),
            ])
            ->assertRedirect(route('external.onboarding.step6.edit', $app->id));

        // Step 6: Deferral Request (Optional) + Certification Checkbox
        $this->actingAs($externalUser)
            ->post(route('external.onboarding.step6.submit', $app->id), [
                'certified_correct' => '1',
            ])
            ->assertRedirect(route('external.application.show', $app->id));

        $app->refresh();
        $this->assertEquals(MemberOnboarding::STATUS_SUBMITTED, (int) $app->approval_status);
        $this->assertTrue((bool) $app->certified_correct);

        // Read-only view works
        $this->withoutExceptionHandling();
        $this->actingAs($externalUser)
            ->get(route('external.application.show', $app->id))
            ->assertStatus(200)
            ->assertSee('Test Capital Ltd');

        // Internal DSD -> MEG -> DOD -> ICG flow
        $dsdUser = User::create([
            'name' => 'DSD Admin',
            'email' => 'dsd_' . uniqid() . '@fmdqgroup.com',
            'usertype' => 'internal',
            'password' => bcrypt('Password123!'),
        ]);
        $dsdUser->assignRole('DsdAdmin');

        $megUser = User::create([
            'name' => 'MEG Admin',
            'email' => 'meg_' . uniqid() . '@fmdqgroup.com',
            'usertype' => 'internal',
            'password' => bcrypt('Password123!'),
        ]);
        $megUser->assignRole('MegAdmin');

        $dodUser = User::create([
            'name' => 'DOD Admin',
            'email' => 'dod_' . uniqid() . '@fmdqgroup.com',
            'usertype' => 'internal',
            'password' => bcrypt('Password123!'),
        ]);
        $dodUser->assignRole('DodAdmin');

        $icgUser = User::create([
            'name' => 'ICG Admin',
            'email' => 'icg_' . uniqid() . '@fmdqgroup.com',
            'usertype' => 'internal',
            'password' => bcrypt('Password123!'),
        ]);
        $icgUser->assignRole('IcgAdmin');

        // DSD Upload Invoice & Confirm Payment
        $this->actingAs($dsdUser)->post(route('internal.invoice.upload'), [
            'app_code' => $app->app_code,
            'invoice_doc' => $this->makePdf('invoice.pdf'),
        ])->assertSessionHasNoErrors();

        $this->actingAs($dsdUser)->post(route('internal.review.dsd'), [
            'app_code' => $app->app_code,
            'status' => MemberOnboarding::STATUS_DSD_APPROVED,
        ])->assertSessionHasNoErrors();

        $this->assertEquals(MemberOnboarding::STATUS_DSD_APPROVED, (int) $app->fresh()->approval_status);

        // MEG Approve with Application Report
        $this->actingAs($megUser)->post(route('internal.review.meg'), [
            'app_code' => $app->app_code,
            'status' => MemberOnboarding::STATUS_MEG_APPROVED,
            'document' => $this->makePdf('app_report.pdf'),
        ])->assertSessionHasNoErrors();

        $this->assertEquals(MemberOnboarding::STATUS_MEG_APPROVED, (int) $app->fresh()->approval_status);

        // DOD Create Account
        $this->actingAs($dodUser)->post(route('internal.review.dod'), [
            'app_code' => $app->app_code,
            'status' => MemberOnboarding::STATUS_DOD_APPROVED,
            'Partner_bpid' => 'P-1001',
            'Client_bpid' => 'C-2002',
        ])->assertSessionHasNoErrors();

        $this->assertEquals(MemberOnboarding::STATUS_DOD_APPROVED, (int) $app->fresh()->approval_status);

        // Participant sees account details on dashboard
        $this->actingAs($externalUser)->get(route('external.dashboard'))
            ->assertStatus(200)
            ->assertSee('P-1001')
            ->assertSee('C-2002');

        // ICG has read-only access (no Verify & Complete action button)
        $this->actingAs($icgUser)->get(route('internal.applications.show', $app->app_code))
            ->assertStatus(200)
            ->assertSee('Read-only view for')
            ->assertDontSee('Verify &amp; Complete', false);

        // Role-based Dashboard Views load cleanly
        $this->actingAs($dsdUser)->get(route('internal.dashboard'))->assertStatus(200)->assertSee('Dashboard (DSD View)');
        $this->actingAs($megUser)->get(route('internal.dashboard'))->assertStatus(200)->assertSee('Dashboard (MEG View)');
        $this->actingAs($dodUser)->get(route('internal.dashboard'))->assertStatus(200)->assertSee('Dashboard (DOD View)');
        $this->actingAs($icgUser)->get(route('internal.dashboard'))->assertStatus(200)->assertSee('Dashboard (ICG View)');

        // Logout works via POST and GET
        $this->actingAs($externalUser)->post(route('logout'))->assertRedirect('/');
        $this->assertGuest();

        $this->actingAs($externalUser)->get(route('logout.get'))->assertRedirect('/');
        $this->assertGuest();
    }

    public function test_unverified_user_can_resend_verification_email_on_login()
    {
        Mail::fake();

        $unverified = User::create([
            'name' => 'Unverified User',
            'email' => 'unverified_' . uniqid() . '@example.com',
            'phone' => '08099999999',
            'usertype' => 'external',
            'password' => bcrypt('Password123!'),
        ]);

        // Unverified login attempt is blocked and flashes unverified_email
        $this->post(route('auth.login.validate'), [
            'email' => $unverified->email,
            'password' => 'Password123!',
        ])->assertRedirect(route('login'))
          ->assertSessionHas('unverified_email', $unverified->email);

        // Resending verification email creates/updates token and sends VerifyEmail
        $this->post(route('auth.verify.resend'), [
            'email' => $unverified->email,
        ])->assertRedirect(route('login'))
          ->assertSessionHas('success');

        Mail::assertSent(\App\Mail\VerifyEmail::class, function ($mail) use ($unverified) {
            return $mail->hasTo($unverified->email);
        });
    }
}
