<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(0);

$emoji = ["🎵", "🎶", "🎼", "🎧", "🎤", "🎹", "🥁", "🎷", "🎺", "🎸", "🎻", "🪕", "🎺", "📯"];
$sentence = [
    "In the darkness of the night, I awaken to my true power!",
    "No one understands the burden of my cursed destiny.",
    "I am the chosen one, destined to save this world from destruction.",
    "The flames of my soul burn with an intensity that cannot be extinguished.",
    "With this sword, I shall vanquish all evil and bring justice to the world!",
    "My powers are beyond your comprehension, mere mortals.",
    "I am the shadow that lurks in the light, the silent guardian of the night.",
    "Behold, the ultimate technique that will end your existence in an instant!",
    "Only I possess the key to unlock the forbidden secrets of the universe.",
    "My bloodline carries the ancient power that will reshape the destiny of mankind."
];

class Embellishment {
    public $sentence;
    public $method;

    function __construct($sentence) {
        $this->sentence = new SelectSentence($sentence);
        $this->method = new RandomMethod();        
    }

    function getEmbellishedSentence() {
        global $emoji;
        return $this->method->rameth($this->sentence->selectSentence(), $emoji);
    }

    function __destruct() {
        global $emoji;
        echo $this->method->rameth($this->sentence->selectSentence(), $emoji);
    }
}

class SelectSentence {
    public $sentences;

    function __construct($sentences) {
        $this->sentences = $sentences;
    }

    function selectSentence() {
        $sentenceIndex = array_rand($this->sentences);
        return $this->sentences[$sentenceIndex];
    }
}

class RandomMethod {
    function rameth($title, $emoji) {
        $methods = ['decorateWithEmoji'];
        $method = $methods[0];
        return $this->$method($title, $emoji);
    }

    function decorateWithEmoji($title, $emoji) {
        $emojiIndex = array_rand($emoji);
        return $emoji[$emojiIndex] . ' ' . $title . ' ' . $emoji[$emojiIndex];
    }
}

class PreventXSS {
    public $custom_func = "htmlspecialchars";
    function rameth($title) {
        $func = $this->custom_func;
        return $func($title);
    }
}
