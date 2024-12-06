<?php
function getChatAnalytics($jsonFile) {
    $data = json_decode(file_get_contents($jsonFile), true);
    $sentMessages = [];
    $receivedMessages = [];
    $sentWords = [];
    
    foreach ($data['messages'] as $message) {
        if ($message['type'] == 'sent') {
            $sentMessages[] = $message['text'];
            $words = explode(' ', $message['text']);
            foreach ($words as $word) {
                $sentWords[$word] = ($sentWords[$word] ?? 0) + 1;
            }
        } else {
            $receivedMessages[] = $message['text'];
        }
    }

    arsort($sentWords);
    $topWords = array_slice(array_keys($sentWords), 0, 5);
    $totalSent = count($sentMessages);
    $totalReceived = count($receivedMessages);
    $avgSentLength = array_sum(array_map('strlen', $sentMessages)) / max($totalSent, 1);
    $avgReceivedLength = array_sum(array_map('strlen', $receivedMessages)) / max($totalReceived, 1);

    return [
        'topWords' => $topWords,
        'totalSent' => $totalSent,
        'totalReceived' => $totalReceived,
        'avgSentLength' => $avgSentLength,
        'avgReceivedLength' => $avgReceivedLength
    ];
}

header('Content-Type: application/json');
echo json_encode(getChatAnalytics('messages.json')); // Replace with the path to your JSON file
?>
