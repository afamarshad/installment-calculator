<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Installment Calculator</title>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="container center_div">
            <h1>Installment Calculator</h1>
            <form id="form" method="POST" action="calculateTenure.php">
            <br/>
                <div class="form-group">
                    <label for="model">Car Model</label>
                    <select id="model" name="model" class="form-control">
                        <option value="0">--Select Model--</option>
                        <option value="1">Honda City 1.3 i-VTEC</option>
                        <option value="2">Honda City 1.3 i-VTEC Prosmatec</option>
                        <option value="3">Honda City 1.5 i-VTEC</option>
                        <option value="4">Honda City 1.5 i-VTEC Prosmatec</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Tenure">Tenure</label>
                    <select id="Tenure" name="Tenure" class="form-control">
                        <option value="0">--Select Tenure--</option>
                        <option value="1">Monthly</option>
                        <option value="2">Yearly</option>
                    </select>
                </div>
                <div id="MonthlyTenure" class="form-group">
                    <label for="monthlyTenure">Monthly Tenure</label>
                    <select id="monthlyTenure" name="monthlyTenure" class="form-control">
                        <option value="0">--Select Monthly Tenure--</option>
                        <option value="1">1 months</option>
                        <option value="2">2 months</option>
                        <option value="3">3 months</option>
                        <option value="4">4 months</option>
                        <option value="3">5 months</option>
                        <option value="4">6 months</option>
                        <option value="3">7 months</option>
                        <option value="4">8 months</option>
                        <option value="3">9 months</option>
                        <option value="4">10 months</option>
                        <option value="3">11 months</option>
                    </select>
                </div>
                <div id="YearlyTenure" class="form-group">
                    <label for="yearlyTenure">Yearly Tenure</label>
                    <select id="yearlyTenure" name="yearlyTenure" class="form-control">
                        <option value="0">--Select Yearly Tenure--</option>
                        <option value="1">1 Years</option>
                        <option value="2">2 Years</option>
                        <option value="3">3 Years</option>
                        <option value="4">4 Years</option>
                        <option value="3">5 Years</option>
                    </select>
                </div>
                <div id="downpayment" class="form-group">
                    <label for="DownPayment">Down Payment</label>
                    <select id="DownPayment" name="DownPayment" class="form-control">
                        <option value="0">--Select Percentage--</option>
                        <option value="1">20%</option>
                        <option value="2">25%</option>
                        <option value="3">30%</option>
                        <option value="4">35%</option>
                        <option value="5">40%</option>
                        <option value="6">45%</option>
                        <option value="7">50%</option>
                    </select>
                </div>
                <span>
                <button id="btncalculateprice" name="btncalculateprice" class="btn btn-primary">Calculate Price</button>
                <button id="clear" name="clear" class="btn btn-primary">Clear</button>
                </span>
                <br/>
                <br/>
                <div style="border:1px solid black;padding:20px;margin-bottom:20px;">
                    <div class="form-group">
                        <label>Model:&nbsp;&nbsp;&nbsp;&nbsp;<label id="modelSelected">Not Selected</label></label>
                    </div>
                    <div class="form-group">
                        <label>Price:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PKR &nbsp;<label id="price">0.0</label></label>
                    </div>
                    <div class="form-group">
                        <label>Down Payment:&nbsp;&nbsp;&nbsp;&nbsp;PKR &nbsp;<label id="downPay">0.0</label></label>
                    </div>
                    <div class="form-group">
                        <label>Total Installment Price:&nbsp;&nbsp;&nbsp;&nbsp;PKR &nbsp;<label id="installmentPrice">0.0</label></label>
                    </div>
                    <div class="form-group">
                        <label>Monthly Installment:&nbsp;&nbsp;&nbsp;&nbsp;PKR &nbsp;<label id="calculateprice">0.0</label></label>
                    </div>
                </div>
            </form>
    </div>

    
    <script type="text/javascript">
    
        $(document).ready(function(){

            $('#form').submit(function(event) {
                event.preventDefault();
            //    alert("This is alert");
                $.ajax({
                    type        : 'POST', 
                    url         : 'calculateTenure.php', 
                    data        : $("#form").serialize()
                })
                .done(function(response) {
                    var respdata = JSON.parse(response);
                    $("#modelSelected").text(respdata.model.toString());
                    $("#price").text(respdata.price.toString());
                    $("#downPay").text(respdata.downpay.toString());
                    $("#installmentPrice").text(respdata.totalPrice.toString());
                    $("#calculateprice").text(respdata.monthlyPrice.toString());

                });
               
            });

            $("#MonthlyTenure").hide();
            $("#YearlyTenure").hide();

            $("#Tenure").change(function () {
                var selectedValue = $(this).val();
                
                if(selectedValue==1){
                    $("#YearlyTenure").hide();
                    $("#MonthlyTenure").show();
                }
                else if(selectedValue==2){
                    $("#YearlyTenure").show();
                    $("#MonthlyTenure").hide();     
                }
                
            });
            
            $("#clear").click(function () {
                $("#calculateprice").text("0.0");
                $('#monthlyTenure').val(0);
                $('#yearlyTenure').val(0);
                $('#model').val(0);
                $('#Tenure').val(0);
                $("#modelSelected").text("Not Selected");
                $("#price").text("0.0");
                $("#downPay").text("0.0");
                $("#installmentPrice").text("0.0");
            });
        });

    </script>


</body>
</html>