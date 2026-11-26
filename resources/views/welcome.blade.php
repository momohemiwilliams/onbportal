<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets/images/fmdq_favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}?v={{ filemtime(public_path('assets/style.css')) }}">
    <title>Q-Depository Onboarding Portal</title>
</head>

<body>
    @include('components.public_header')

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <h1>Q-Depository Onboarding Portal</h1>
            <p>Become a Participant &mdash; streamlined digital onboarding, document submission, and real-time application tracking.</p>

            <div class="hero-actions">
                <a href="{{ auth()->check() ? route('home') : route('register') }}" class="get-started-btn">
                    <span>Get Started</span>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="margin-left: 8px;" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </a>
                <a href="#requirements" class="hero-secondary-btn">
                    <span>View Checklist</span>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="margin-left: 8px;" aria-hidden="true"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </a>
            </div>

            <div class="hero-steps">
                <div class="hero-step-card">
                    <div class="hero-step-num">Step 01</div>
                    <div class="hero-step-title">Register &amp; Verify</div>
                    <div class="hero-step-desc">Create your portal account and verify your email address.</div>
                </div>
                <div class="hero-step-card">
                    <div class="hero-step-num">Step 02</div>
                    <div class="hero-step-title">Complete Application</div>
                    <div class="hero-step-desc">Select eligibility type and upload required PDF documents.</div>
                </div>
                <div class="hero-step-card">
                    <div class="hero-step-num">Step 03</div>
                    <div class="hero-step-title">Review &amp; Activation</div>
                    <div class="hero-step-desc">Receive review updates, complete fee payment, and get your account details.</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Requirements Checklist -->
    <main class="onboarding-req" id="requirements">
        <div class="section-heading">
            <h2>Participants Onboarding Requirements</h2>
            <p>Please prepare the following documents (PDF format, max 5MB per file) before starting your application.</p>
        </div>

        <div class="req-list">
            <div class="req-list-header">
                <h3>Documents Requirements Checklist</h3>
                <span class="req-count-badge">15 Checklist Items</span>
            </div>

            @php
                $requirements = [
                    'FMDQD Participant Eligibility Form',
                    'A certified true copy of the ‘Memorandum and Articles of Association’ for the company',
                    'A certified true copy of the ‘Board Resolution’ to onboard as a participant of FMDQ Depository',
                    'Certificate of Incorporation',
                    'Particulars of Directors - CAC Form 7 (include CAC 1.1 or Status Report where there is change of Director)',
                    'Particulars of Shareholders - CAC Form 2 or Status Report (if applicable)',
                    'Evidence of Securities and Exchange Commission (SEC) Registration (for SEC regulated entities)',
                    'Evidence of Trading Exchange License/Approval for proprietary and/or client trade (if Applicable)',
                    'Evidence of Registration from other Regulatory bodies (if Applicable)',
                    'Means of Identification (International Passport bio page preferred or Driver’s License) and National Identification Number Slip of all nominated principal officer(s)',
                    'Executed Data Subject Consent Form for all nominated Principal Officers',
                    'Duly completed ‘Signature Mandate Form(s)’',
                    'Duly completed ‘Declaration Form’',
                    'Evidence of Payment of Application Fee - Annual eligibility fee',
                    'Evidence of Current Year SEC Registration Renewal (for SEC regulated entities)',
                ];
            @endphp

            <div class="req-list-container">
                @foreach ($requirements as $item)
                    <div class="req-list-items">
                        <svg class="req-check-icon" width="22" height="22" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path d="M19 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2zm-8.29 13.29a1 1 0 0 1-1.42 0l-3.29-3.3a1 1 0 1 1 1.42-1.41L10 14.17l6.59-6.59a1 1 0 1 1 1.41 1.42l-7.29 7.29z"/>
                        </svg>
                        <p>{{ $item }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </main>

    @include('components.public_footer')
</body>

</html>
