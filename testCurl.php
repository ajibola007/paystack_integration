<?php
        // create curl resource
        // You can also set the URL you want to communicate with by doing this:
        // $curl = curl_init('http://localhost/echoservice');
        $ch = curl_init();
        
        // Set the url path we want to call
        curl_setopt($ch, CURLOPT_URL, "api.paystack.co/transaction/charge_authorization");

        // We POST the data
        curl_setopt($curl, CURLOPT_POST, 1);

        // Make it so the data coming back is put into a string
        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, true);

        if(curl_error($ch)){
        echo 'error:' . curl_error($ch);
        }

        // close curl resource to free up system resources
        curl_close($ch);

        print "$output";

?>

<!-- check this for tutorial on curl http://www.giantflyingsaucer.com/blog/?p=2125 -->

