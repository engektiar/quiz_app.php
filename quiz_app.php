<?php

$questions = [
    ['question' => 'What is 2 + 2?', 'correct' => '4'],
    ['question' => 'What is the capital of France?', 'correct' => 'Paris'],
    ['question' => 'Who wrote "Hamlet"?', 'correct' => 'Shakespeare'],
];

function evaluateQuiz(array $questions, array $answers): int
{
    $score = 0;

    foreach ($questions as $index => $question) {
        if (isset($answers[$index]) && strtolower(trim($answers[$index])) === strtolower(trim($question['correct']))) {
            $score++;
        }
    }

    return $score;
}

$userAnswers = [];

echo "Welcome to the PHP Quiz Application!\n";
echo "Please answer the following questions:\n\n";


foreach ($questions as $index => $question) {
    echo ($index + 1) . ". " . $question['question'] . "\n";
    $answer = readline("Your answer: ");
    $userAnswers[] = $answer;
    echo "\n";
}

$totalQuestions = count($questions);
$score = evaluateQuiz($questions, $userAnswers);


echo "You scored $score out of $totalQuestions.\n";


if ($score === $totalQuestions) {
    echo "Excellent job!\n";
} elseif ($score > ($totalQuestions / 2)) {
    echo "Good effort!\n ";
} else {
    echo "Better luck next time!\n";
}
