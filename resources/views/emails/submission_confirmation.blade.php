<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Application Confirmation</title>
</head>
<body style="font-family: Arial, sans-serif; color: #333;">
    <p>Dear {{ $name ?? 'Participant' }},</p>
    <p>We acknowledge receipt of your Q-Depository Onboarding Portal application for <strong>{{ $institution }}</strong> (Reference: <strong>#{{ $app_code }}</strong>) and will provide feedback within three (3) working days.</p>
    <p>
        <a href="{{ $view_url }}" style="display:inline-block;padding:10px 18px;background-color:#9e8145;color:#ffffff;text-decoration:none;border-radius:4px;">
            View Information
        </a>
    </p>
    <p>Thank you.</p>
</body>
</html>

