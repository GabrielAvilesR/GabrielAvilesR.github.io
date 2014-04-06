#!/bin/bash

./speech2text.sh

QUESTION=$(cat stt.txt)
echo ' '$QUESTION

ANSWER=$(python queryprocess.py $QUESTION)
echo " Dr: " $ANSWER

./text2speech.sh $ANSWER
