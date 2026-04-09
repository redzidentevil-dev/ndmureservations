<?php
/**
 * SMTP Mailer helpers for NDMU Booking System.
 * Uses PHP's built-in mail() as a fallback.
 * Configure SMTP_HOST, SMTP_PORT, SMTP_USER, SMTP_PASS env vars for production.
 */
declare(strict_types=1);

function sendPasswordResetEmail(string $toEmail, string $toName, string $resetLink): bool
{
    $subject = 'NDMU Booking System - Password Reset';
    $body = "Hello {$toName},\n\n"
          . "You requested a password reset for your NDMU Booking System account.\n\n"
          . "Click the link below to reset your password (valid for 1 hour):\n"
          . "{$resetLink}\n\n"
          . "If you did not request this, please ignore this email.\n\n"
          . "-- NDMU Facility Booking System";

    $headers = "From: noreply@ndmu.edu.ph\r\n"
             . "Reply-To: noreply@ndmu.edu.ph\r\n"
             . "Content-Type: text/plain; charset=UTF-8\r\n";

    return @mail($toEmail, $subject, $body, $headers);
}
