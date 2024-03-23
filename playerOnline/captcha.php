<?php
session_start();

$questions_answers = [
    "Quel est la capital de la France?" => "Paris",
    "Quel est la plus grande planete du systeme solaire ?" => "Jupiter",
    "Quel est la plus grande montagne du monde ?" => "Everest",
    "Qui a inventé le premier appareil photo numérique?" => "Steven Sasson",
    "Qui a inventé le World Wide Web?" => "Tim Berners-Lee",
    "Qui a découvert la radioactivité?" => "Marie Curie",
];

$selected_question = array_rand($questions_answers);
$correct_answer = $questions_answers[$selected_question];

$_SESSION['correct_answer'] = $correct_answer;
