<?php
declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode([
        'reply' => 'Method not allowed.',
        'intent' => 'error',
        'needsContact' => false,
        'suggestions' => []
    ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    exit;
}

$rawInput = file_get_contents('php://input');
$payload = json_decode($rawInput ?: '{}', true);
$message = trim((string)($payload['message'] ?? ''));

if ($message === '') {
    http_response_code(422);
    echo json_encode([
        'reply' => 'Please type a valid message.',
        'intent' => 'error',
        'needsContact' => false,
        'suggestions' => [
            ['label' => 'Courses Offered', 'query' => 'Courses offered'],
            ['label' => 'Admission Process', 'query' => 'Admission process']
        ]
    ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    exit;
}

function containsAny(string $text, array $keywords): bool
{
    foreach ($keywords as $keyword) {
        if ($keyword !== '' && stripos($text, $keyword) !== false) {
            return true;
        }
    }
    return false;
}

function detectIntent(string $message): string
{
    $q = strtolower($message);

    if (containsAny($q, ['main menu', 'menu'])) {
        return 'menu';
    }
    if (containsAny($q, ['admission', 'apply', 'enroll', 'registration', 'next step'])) {
        return 'admission';
    }
    if (containsAny($q, ['anm', 'auxiliary'])) {
        return 'anm';
    }
    if (containsAny($q, ['gnm'])) {
        return 'gnm';
    }
    if (containsAny($q, ['bsc', 'b.sc', 'bsc nursing'])) {
        return 'bsc';
    }
    if (containsAny($q, ['course', 'courses'])) {
        return 'courses';
    }
    if (containsAny($q, ['fees', 'fee', 'payment'])) {
        return 'fees';
    }
    if (containsAny($q, ['document', 'documents', 'certificate', 'marksheet', 'id proof'])) {
        return 'documents';
    }
    if (containsAny($q, ['facility', 'facilities', 'lab', 'hostel', 'library', 'campus'])) {
        return 'facilities';
    }
    if (containsAny($q, ['scholarship', 'financial aid'])) {
        return 'scholarship';
    }
    if (containsAny($q, ['exam', 'result'])) {
        return 'exam';
    }
    if (containsAny($q, ['contact', 'call', 'phone', 'email', 'address', 'map', 'location'])) {
        return 'contact';
    }

    return 'fallback';
}

function suggestionsForIntent(string $intent): array
{
    $map = [
        'menu' => [
            ['label' => 'Courses Offered', 'query' => 'Courses offered'],
            ['label' => 'Admission Process', 'query' => 'Admission process'],
            ['label' => 'Fees Details', 'query' => 'Fees details'],
            ['label' => 'Contact Support', 'query' => 'Contact support']
        ],
        'admission' => [
            ['label' => 'Next Step', 'query' => 'Next step'],
            ['label' => 'Documents Required', 'query' => 'Documents required'],
            ['label' => 'Fees Details', 'query' => 'Fees details'],
            ['label' => 'Contact Support', 'query' => 'Contact support']
        ],
        'courses' => [
            ['label' => 'ANM Details', 'query' => 'ANM details'],
            ['label' => 'GNM Details', 'query' => 'GNM details'],
            ['label' => 'B.Sc Nursing', 'query' => 'B.Sc details'],
            ['label' => 'Admission Process', 'query' => 'Admission process']
        ],
        'anm' => [
            ['label' => 'Admission Process', 'query' => 'Admission process'],
            ['label' => 'Documents Required', 'query' => 'Documents required'],
            ['label' => 'Main Menu', 'query' => 'Main menu']
        ],
        'gnm' => [
            ['label' => 'Admission Process', 'query' => 'Admission process'],
            ['label' => 'Fees Details', 'query' => 'Fees details'],
            ['label' => 'Main Menu', 'query' => 'Main menu']
        ],
        'bsc' => [
            ['label' => 'Admission Process', 'query' => 'Admission process'],
            ['label' => 'Fees Details', 'query' => 'Fees details'],
            ['label' => 'Main Menu', 'query' => 'Main menu']
        ],
        'fees' => [
            ['label' => 'Contact Support', 'query' => 'Contact support'],
            ['label' => 'Admission Process', 'query' => 'Admission process'],
            ['label' => 'Main Menu', 'query' => 'Main menu']
        ],
        'documents' => [
            ['label' => 'Admission Process', 'query' => 'Admission process'],
            ['label' => 'Contact Support', 'query' => 'Contact support'],
            ['label' => 'Main Menu', 'query' => 'Main menu']
        ],
        'facilities' => [
            ['label' => 'Courses Offered', 'query' => 'Courses offered'],
            ['label' => 'Contact Support', 'query' => 'Contact support'],
            ['label' => 'Main Menu', 'query' => 'Main menu']
        ],
        'scholarship' => [
            ['label' => 'Admission Process', 'query' => 'Admission process'],
            ['label' => 'Contact Support', 'query' => 'Contact support'],
            ['label' => 'Main Menu', 'query' => 'Main menu']
        ],
        'exam' => [
            ['label' => 'Result Help', 'query' => 'Result help'],
            ['label' => 'Contact Support', 'query' => 'Contact support'],
            ['label' => 'Main Menu', 'query' => 'Main menu']
        ],
        'contact' => [
            ['label' => 'Open Contact Support', 'query' => 'Contact support'],
            ['label' => 'Main Menu', 'query' => 'Main menu']
        ],
        'fallback' => [
            ['label' => 'Courses Offered', 'query' => 'Courses offered'],
            ['label' => 'Admission Process', 'query' => 'Admission process'],
            ['label' => 'Contact Support', 'query' => 'Contact support']
        ]
    ];

    return $map[$intent] ?? $map['fallback'];
}

function localReplyForIntent(string $intent): array
{
    switch ($intent) {
        case 'menu':
            return ['reply' => 'Main menu is ready. Choose your topic.', 'needsContact' => false];
        case 'admission':
            return ['reply' => 'Admission guidance is ready. Use Next Step to continue.', 'needsContact' => false];
        case 'anm':
            return ['reply' => 'ANM is a foundational nursing program with practical training.', 'needsContact' => false];
        case 'gnm':
            return ['reply' => 'GNM combines theory and clinical exposure for hospital-ready skills.', 'needsContact' => false];
        case 'bsc':
            return ['reply' => 'B.Sc Nursing offers advanced academic and clinical preparation.', 'needsContact' => false];
        case 'courses':
            return ['reply' => 'Available courses: ANM, GNM, and B.Sc Nursing.', 'needsContact' => false];
        case 'fees':
            return ['reply' => 'Fees can change by session. Please confirm latest fees with Contact Support.', 'needsContact' => true];
        case 'documents':
            return ['reply' => 'Common documents: photos, ID proof, marksheets, and migration documents if applicable.', 'needsContact' => false];
        case 'facilities':
            return ['reply' => 'Facilities include practical labs, academic support, and student-focused campus services.', 'needsContact' => false];
        case 'scholarship':
            return ['reply' => 'Scholarship support is eligibility-based. Please verify current criteria with admissions.', 'needsContact' => false];
        case 'exam':
            return ['reply' => 'Exam and result updates are posted on dedicated pages.', 'needsContact' => false];
        case 'contact':
            return ['reply' => 'Contact: Sandalpur (Bazar Samiti), Mahendru, Bahadurpur, Patna - 800006. Email: gurudeocollegeofnursing@gmail.com', 'needsContact' => true];
        default:
            return ['reply' => 'I can help with courses, admission, fees, facilities, and contact support.', 'needsContact' => false];
    }
}

function callGeminiIfConfigured(string $userMessage): ?string
{
    $apiKey = getenv('GEMINI_API_KEY');
    if ($apiKey === false || trim($apiKey) === '') {
        return null;
    }

    if (!function_exists('curl_init')) {
        return null;
    }

    $url = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=' . urlencode($apiKey);

    $prompt = 'You are a nursing college counselor assistant. Reply in simple English, 1-3 short lines, student-friendly, accurate, and non-fabricated.';

    $payload = [
        'contents' => [
            [
                'parts' => [
                    ['text' => $prompt . "\nUser query: " . $userMessage]
                ]
            ]
        ],
        'generationConfig' => [
            'temperature' => 0.35,
            'maxOutputTokens' => 160
        ]
    ];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 6);

    $response = curl_exec($ch);
    $curlError = curl_error($ch);
    curl_close($ch);

    if ($response === false || $curlError !== '') {
        return null;
    }

    $decoded = json_decode($response, true);
    $text = $decoded['candidates'][0]['content']['parts'][0]['text'] ?? null;

    if (!is_string($text) || trim($text) === '') {
        return null;
    }

    return trim($text);
}

$intent = detectIntent($message);
$local = localReplyForIntent($intent);
$reply = $local['reply'];
$source = 'rules';

if ($intent === 'fallback') {
    $geminiReply = callGeminiIfConfigured($message);
    if (is_string($geminiReply) && $geminiReply !== '') {
        $reply = $geminiReply;
        $source = 'gemini';
    }
}

echo json_encode([
    'reply' => $reply,
    'intent' => $intent,
    'needsContact' => (bool)($local['needsContact'] ?? false),
    'suggestions' => suggestionsForIntent($intent),
    'source' => $source
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
