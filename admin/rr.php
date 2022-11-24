<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- custom css file link  -->
    <link rel="stylesheet" href="credit.css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto&display=swap');
* {
  margin:0px;
  padding:0px;
  box-sizing:border-box;
  font-family:"Roboto",sans-serif;
}
body {
  background:#a5a6a7;
}
.center {
  position:absolute;
  top:60%;
  left:50%;
  transform:translate(-50%,-50%);
}

.card {
  width:350px;
  height:430px;
  border:2px solid #e4e1e1;
  padding:100px 30px 30px;  
  background:#e6e6e6;
  border-radius:15px;
}

.card-display {
  position:absolute;
  top:-100px;
  left:25px;
  background-color: transparent;
  width: 300px;
  height: 200px;
  perspective: 1000px;
  cursor:pointer;
}

.card-display .card-box-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.8s;
  transform-style: preserve-3d;
}

.card-display:hover .card-box-inner,
.card-display.active .card-box-inner{
  transform: rotateY(180deg);
}
.card-box-front, .card-box-back {
  position: absolute;
  width: 100%;
  height: 100%;
  backface-visibility: hidden;
  border-radius:10px;    
  color: #f5f5f5;
  background-color: #3564ad;
}
.card-box-back {
  transform: rotateY(180deg);
}

.card .card-input-box .inputs input,
.card .card-input-box .inputs select {
  margin-top:5px;
  padding:8px;
}
.card .card-input-box .inputs .col-4 > * {
  width:23.9%;
}
.card .card-input-box .inputs .input-group {
  margin:18px 0px;
}
.card .card-input-box .inputs .input-group:nth-child(2) input{
  width:100%;
}

.card .card-input-box .inputs .col-2 > div {
  float:left;
  width:60%;
}
.card .card-input-box .inputs .col-2 > div:nth-child(2) {
  text-align:right;
  width:40%;
}
.card .card-input-box .inputs .col-2 > div select {
  width:70px;
}
.card .card-input-box .inputs .col-2 > div input {
  width:50px;
}
.card .card-input-box .inputs label {
  font-size:13px;
  text-transform:uppercase;
  color:#555;
  display:block;
}
.card .card-input-box .inputs .input-group button {
  width:100%;
  height:40px;
  font-size:15px;
  font-weight:600;
  text-transform:uppercase;
  margin-top:30px;
  outline:none;
  background:#565b65;
  color:#ddd;
  border:none;
  border-radius:5px;
}

/* View */
.card .card-box-front .chip {
  width:40px;
  height:30px;
  background:#cecfd0;
  position:relative;
  top:35px;
  left:30px;
  border-radius:5px;
  overflow:hidden;
}
.card .card-box-front .chip:before {
  content:"";
  display:block;
  width:22px;
  height:30px;
  border-left:1px solid #eae4e4;
  border-right:1px solid #eae4e4;
  margin-left:8px; 
}
.card .card-box-front .chip:after {
  position:absolute;
  top:-10px;
  content:"";
  display:block;
  width:18px;
  height:50px;
  transform:rotate(90deg);
  border-left:1px solid #eae4e4;
  border-right:1px solid #eae4e4;
  margin-left:7px; 
}
.card .card-box-front .cardnumber {
  width:100%;
  height:30px;
  position:relative;
  top:55px;
  padding:0px 20px;
  text-align:center;
  line-height:30px;
  background:#4d6eb7;
}
.card .card-box-front .cardnumber div {
  width:62px;
  height:100%;
  float:left;
  font-size:20px;
  color:white;
  margin:0px 1px;
}

.card .card-box-front .account-holder-name {
  position:relative;
  top:100px;
  float:left;
  width:200px;
  text-align:left;
  padding-left:30px;
  background:#4d6eb7;
  height:24px;
  font-size:14px;
  line-height:24px;
}
.card .card-box-front .account-holder-name:before,
.card .card-box-front .expiry:before,
.card .card-box-back .cvv .code:before {
  content:"Card holder";
  font-size:10px;
  display:block;
  position:absolute;
  top:-22px;
  left:25px;
  text-transform:uppercase;
  color:#ddd;
}
.card .card-box-front .expiry {
  position:relative;
  top:100px;
  float:right;
  height:24px;
  width:80px;
  padding-left:15px;
  background:#4d6eb7;
  font-size:14px;
  line-height:24px;
}
.card .card-box-front .expiry:before {
  content:"Expires";
}
.card .card-box-front .expiry div {
  float:left;
  margin:0px 2px;
}

.card .card-box-back .plate {
  position:relative;
  top:20px;
  height:40px;
  background:black;
  width:100%;
} 

.card .card-box-back .cvv {
  position:relative;
  top:40px;
  height:30px;
  background:#f5f5f5;
  width:220px;
  left:20px;
} 
.card .card-box-back .cvv .code {
  float:right;
  width:50px;
  height:100%;
  line-height:30px;
  font-size:18px;
  text-algin:center;
  background:#eee;
  color:#222;
}
.card .card-box-back .cvv .code:before {
  content:"CVV";
  right:-150px;
  top:-22px;
}
    </style>

</head>
<body>

<div class="center card">
  <div class="card-display">
    <div class="card-box-inner">
      <div class="card-box-front">
        <div class="chip"></div>
        <div class="cardnumber">
          <div class="part-1"></div>
          <div class="part-2"></div>
          <div class="part-3"></div>
          <div class="part-4"></div>
        </div>
        <div class="account-holder-name"></div>
        <div class="expiry">
          <div class="month"></div>
          <div>/</div>
          <div class="year"></div>
        </div>
      </div>
      <div class="card-box-back">
        <div class="plate"></div>
        <div class="cvv">
          <div class="code"></div>
        </div>
      </div>
    </div>    
  </div>
  <div class="card-input-box">
    <div class="inputs">
      <div class="input-group">
        <div class="row">
          <label for="">Card number</label>
        </div>
        <div class="row col-4">
          <input type="text" id="card-number-1" maxlength="4">
          <input type="text" id="card-number-2" maxlength="4">
          <input type="text" id="card-number-3" maxlength="4">
          <input type="text" id="card-number-4" maxlength="4">
        </div>
      </div>
      <div class="input-group">
        <label for="">Account holder</label>
        <input type="text" id="account-holder" maxlength="20">
      </div>
      <div class="input-group">
        <div class="row col-2">
          <div class="row">
            <label for="Expiry">Expiry</label>
            <div>
              <select id="expiry-month">
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
              </select>
              <select id="expiry-year">
                <option value="19">2019</option>
                <option value="20">2020</option>
                <option value="21">2021</option>
                <option value="22">2022</option>
                <option value="23">2023</option>
                <option value="24">2024</option>
                <option value="25">2025</option>
              </select>
            </div>
          </div>
          <div class="row">
            <label for="">CVV</label>
            <input type="text" id="cvv-code" maxlength="3">
          </div>
        </div>
      </div>
      <div class="input-group">
        <button>Submit</button>
      </div>
    </div>
  </div>
</div>

<!-- script -->
<script>
      var cardnumberIp = [
  document.getElementById("card-number-1"),
  document.getElementById("card-number-2"),
  document.getElementById("card-number-3"),
  document.getElementById("card-number-4")
];
var cardNumberView = document.getElementsByClassName("cardnumber")[0];
cardnumberIp[0].addEventListener("keyup",function(){
  cardNumberView.getElementsByClassName("part-1")[0].innerText = this.value;
});
cardnumberIp[1].addEventListener("keyup",function(){
  cardNumberView.getElementsByClassName("part-2")[0].innerText = this.value;
});
cardnumberIp[2].addEventListener("keyup",function(){
  cardNumberView.getElementsByClassName("part-3")[0].innerText = this.value;
});
cardnumberIp[3].addEventListener("keyup",function(){
  cardNumberView.getElementsByClassName("part-4")[0].innerText = this.value;
});


var accountHolderIp = document.getElementById("account-holder");
var accountHolderView =  document.getElementsByClassName("account-holder-name")[0];

accountHolderIp.addEventListener("keyup",function(){
  accountHolderView.innerText = this.value;
});


var accountExpiryView  = {
  month:document.getElementsByClassName("expiry")[0].getElementsByClassName("month")[0],
  year:document.getElementsByClassName("expiry")[0].getElementsByClassName("year")[0]
};
var expiryMonth = document.getElementById("expiry-month");
var expiryYear = document.getElementById("expiry-year");

expiryMonth.addEventListener("change",function(){
  accountExpiryView.month.innerText = this.value;
});
expiryYear.addEventListener("change",function(){
  accountExpiryView.year.innerText = this.value;
});


var cvvCodeView = document.getElementsByClassName("cvv")[0].getElementsByClassName("code")[0];
var cvvCode = document.getElementById("cvv-code");
cvvCode.addEventListener("keyup",function(){
  cvvCodeView.innerText = this.value;
});
cvvCode.addEventListener("focus",function(){
  document.getElementsByClassName("card-display")[0].classList.add("active");
});
cvvCode.addEventListener("blur",function(){
  document.getElementsByClassName("card-display")[0].classList.remove("active");
});
</script>
</body>
</html>