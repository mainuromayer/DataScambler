<?php
function displayKey( $key ) {
	printf( " value = '%s' ", $key );
}

# data encode : orginal data গুলোকে ওলটপালট করা হচ্ছে।
function scrambleData($orginalData, $key){
    $orginalKey = 'abcdefghijklmnopqrstuvwxyz1234567890';
    $data = ''; // scramble করার পরে যে ডাটা গুলো জমা করব।

    $length = strlen($orginalData);

    for ($i=0; $i<$length; $i++){
        $currentChar = $orginalData[$i];
        # $orginalKey এর মধ্যে যে word এর সাথে user এর ডাটার word মিল থাকবে সে পজিশন এর index বের হবে
        # $orginalKey এর মধ্যে position টা খুঁজব।
        $position = strpos($orginalKey, $currentChar);

        if ($position !== false){ // position এর index 0 হতে পারে, তাই type check করা
            $data .= $key[$position];
        }else{
            $data .= $currentChar;  // punctuation & space গুলো $orginalKey এর সাথে সাধারণত মিলবে না, কারন সেগুলো orginalKey তে নেই, তাই সেগুলো সেই position এ থাকবে
        }
    }
    return $data;
}



# data decode :
function decodeData($orginalData, $key){
    $orginalKey = 'abcdefghijklmnopqrstuvwxyz1234567890';
    $data = '';

    $length = strlen($orginalData);

    for ($i=0; $i<$length; $i++){
        $currentChar = $orginalData[$i];
        # $key এর মধ্যে যে word এর সাথে user এর ডাটার word মিল থাকবে সে পজিশন এর index বের হবে
        # $key এর মধ্যে position টা খুঁজব।
        $position = strpos($key, $currentChar);

        if ($position !== false){ // position এর index 0 হতে পারে, তাই type check করা
            $data .= $orginalKey[$position];
        }else{
            $data .= $currentChar;  // punctuation & space গুলো $orginalKey এর সাথে সাধারণত মিলবে না, কারন সেগুলো orginalKey তে নেই, তাই সেগুলো সেই position এ থাকবে
        }
    }
    return $data;
}

