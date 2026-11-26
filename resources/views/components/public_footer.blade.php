<style>
    .qdop-pub-footer {
        background-color: #ffffff;
        border-top: 3px solid #ad8e4f;
        padding: 36px 5% 22px;
        width: 100%;
    }
    .qdop-pub-footer-inner {
        max-width: 1120px;
        margin: 0 auto;
    }
    .qdop-pub-footer-flex {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 24px;
        padding-bottom: 20px;
        border-bottom: 1px solid #e2e8f0;
    }
    .qdop-pub-footer-brand img {
        height: 36px;
        width: auto;
    }
    .qdop-pub-footer-brand p {
        font-size: 13px;
        color: #64748b;
        margin-top: 8px;
        margin-bottom: 0;
        max-width: 340px;
        line-height: 1.55;
    }
    .qdop-pub-footer-contact {
        text-align: right;
    }
    .qdop-pub-footer-contact h4 {
        font-size: 15px;
        font-weight: 700;
        color: #22346c;
        margin-bottom: 8px;
    }
    .qdop-pub-footer-contact p {
        font-size: 13.5px;
        color: #475569;
        margin: 4px 0;
    }
    .qdop-pub-footer-contact span {
        font-weight: 600;
        color: #0f172a;
        margin-right: 6px;
    }
    .qdop-pub-footer-bottom {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px;
        padding-top: 16px;
        font-size: 13px;
        color: #64748b;
    }
    @media (max-width: 768px) {
        .qdop-pub-footer-contact {
            text-align: left;
        }
    }
</style>

<footer class="qdop-pub-footer">
    <div class="qdop-pub-footer-inner">
        <div class="qdop-pub-footer-flex">
            <div class="qdop-pub-footer-brand">
                <img src="{{ asset('assets/images/FMDQ_Logo.png') }}" alt="FMDQ Logo">
                <p>FMDQ Depository Onboarding Portal for Capital Market Operators, Corporates, Private Accounts, and Settlement Banks.</p>
            </div>
            <div class="qdop-pub-footer-contact">
                <h4>Contact Us</h4>
                <p><span>Email:</span>dsd@fmdqgroup.com | dod@fmdqgroup.com</p>
                <p><span>Phone:</span>+234 1 7008555 | +234 1 2778771</p>
            </div>
        </div>
        <div class="qdop-pub-footer-bottom">
            <span>Powered by iQx Consult Limited &copy; {{ date('Y') }}</span>
            <span>FMDQ Group PLC</span>
        </div>
    </div>
</footer>

