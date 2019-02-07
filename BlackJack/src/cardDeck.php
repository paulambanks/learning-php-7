<?php

//OOP is great in that it promotes encapsulation of code: separated functions, classes, and methods 
//— each with their own scopes and purposes. 

class Card {
    
    const suits = array('Hearts', 'Spade', 'Diamond', 'Clubs');
    const values = array('2', '3', '4', '5', '6', '7', '8', '9', '10',
            'J', 'Q', 'K', 'A');
    
    private $suit; // instance variable or property
    private $value;
    
    // For PRIVATE: Only the object's own methods can directly 
    // inspect or manipulate its fields.  
    
    public function __construct($suit, $value) {
        if (in_array($suit, Card::suits)) { // check if suit is valid
            $this->suit = $suit; // initialisation
        } else {
            throw InvalidArgumentException("$suit is not a valid suit.");
        }
        if (in_array($value, Card::values)) { // check if value is valid
            $this->value = $value; // initialisation
        } else {
            throw InvalidArgumentException("$value is not a valid value.");
        }   
    }
    
    public function value() { // accessor (getter) fetches the private data stored within an object
        return $this->value;
    }
    
    public function suit() {
        return $this->suit;
    }
    
    public function __toString() {
        return $this->suit . " " . $this->value;
    }
}

class Deck implements IteratorAggregate { // treating deck as an iterable/traversable object
    
    private $cards = array();
    
    public function __construct() {
        // Creates a deck of 52 cards and returns an array
        foreach (Card::suits as $suit) {
            foreach (Card::values as $value) {
                $card = new Card($suit, $value);
                array_push($this->cards, $card);
            }
        }
    }
    
    public function getIterator() { // Creating a new ArrayIterator object that allows iteration over private member $cards 
        return new ArrayIterator($this->cards);
    }

    public function shuffle() {
        
        foreach ($this->cards as $index => $card) {
            // create a new index to swap cards
            $indexSwap = rand(0, count($this->cards)-1); // index of value to swap
            // Create temporary location to store card A.
            $temp = $this->cards[$indexSwap];
            // Move card B to location A
            $this->cards[$indexSwap] = $this->cards[$index];
            // Move temp card to location B
            $this->cards[$index] = $temp;
        }
    }
}

