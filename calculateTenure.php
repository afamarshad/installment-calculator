<?php
    $price = 0;
    $model = $_POST['model'];
    $months = $_POST['monthlyTenure'];
    $years = $_POST['yearlyTenure'];
    $downPayment = $_POST['DownPayment'];
    $downPaymentToPay = 0;
    $NewPrice =0;
    $priceToUse = 0;
 
    if($model==1){
        $model = "Honda City 1.3 i-VTEC";
        $price = 2309000;
    }else if($model == 2){
        $model = "Honda City 1.3 i-VTEC Prosmatec";
        $price = 2489000;
    }else if($model == 3){
        $model = "Honda City 1.5 i-VTEC";
        $price = 2369000;
    }else if($model == 4){
        $model = "Honda City 1.5 i-VTEC Prosmatec";
        $price = 2539000;
    }else{
        $model = "Not Selected";
        $price = 0;
    }

    //For DownPayment
    if($downPayment != 0)
    {
        if($downPayment == 1){
            $downPaymentToPay = $price * 20/100;
            $priceToUse = $price - $downPaymentToPay;
        }else if($downPayment == 2){
            $downPaymentToPay = $price * 25/100;
            $priceToUse = $price - $downPaymentToPay;
        }else if($downPayment == 3){
            $downPaymentToPay = $price * 30/100;
            $priceToUse = $price - $downPaymentToPay;
        }else if($downPayment == 4){
            $downPaymentToPay = $price * 35/100;
            $priceToUse = $price - $downPaymentToPay;
        }else if($downPayment == 5){
            $downPaymentToPay = $price * 40/100;
            $priceToUse = $price - $downPaymentToPay;
        }else if($downPayment == 6){
            $downPaymentToPay = $price * 45/100;
            $priceToUse = $price - $downPaymentToPay;
        }else if($downPayment == 7){
            $downPaymentToPay = $price * 50/100;
            $priceToUse = $price - $downPaymentToPay;
        }

        //For Months
        if($months !=0){
            $interest = 0;
            for($i=1;$i<=$months;$i+=2){
                $interest = $interest+(2.5*10/100);
                $NewPrice = $NewPrice+(($priceToUse * $interest)+$priceToUse); 
            }
            echo json_encode(
                array("model"=> $model,
                "price" => $price,
                "downpay" => $downPaymentToPay, 
                "totalPrice" => $NewPrice,
                "monthlyPrice" => $NewPrice/$months
            ));
        }
        else if($years != 0){  //For Years
            $interest = 0;
            for($j=1;$j<=$years;$j++){
                for($i=1;$i<=12;$i+=2){
                    $interest = $interest+(2.5*10/100);
                    $NewPrice = $NewPrice+(($priceToUse * $interest)+$priceToUse);
                }
            }
            echo json_encode(
                array("model"=> $model,
                "price" => $price,
                "downpay" => $downPaymentToPay, 
                "totalPrice" => $NewPrice,
                "monthlyPrice" => $NewPrice/$years*12
            ));
        }
    }else{
        $downPaymentToPay = "0.0";
        $priceToUse = 0;
    }
    

?>