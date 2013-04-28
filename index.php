<?php 
if(!empty($_POST['link'])){?>
<script>var ted_link="<?php echo $_POST['link']; ?>";</script>
<?php
}
?>
<html>
<head>
<meta name="keywords" content="TED,學英文,單字,常出現,learn,english,frequent,word,vocabulary"/>
<meta name="description" content="看TED學英文，找出TED影片最常出現的單字。Learning English by watching TED film, offer you most frequent words in TED."/>
<meta name="author" content="林宏哲,Hong-Che Lin,Paul Lin"/>
<meta name="copyright" content="CC"/>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<meta name="URL" content="http://www.cs.nccu.edu.tw/~s9513/ted"/>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-40359712-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="./work.js"></script>
<style>
#loading{
text-align:center;
display:none;
}
.test{
display:none;
}
</style>
<title>TED subtitled words</title></head>
<style type="text/css">
.wordline{
	font-weight:bloder;
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size:0.8cm;
	display:inline-block;
	vertical-align:middle;
	margin-left:20px;
	margin-top:10px;
	-webkit-border-radius: 6px;
	-moz-border-radius: 6px;
	border-radius: 6px;
	background-color:rgba(0, 235, 255, 0.06);
	/*rgba(255, 0, 41, 0.06)*/
}
.wordline2{
	font-weight:bloder;
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size:0.8cm;
	display:inline-block;
	vertical-align:middle;
	margin-left:20px;
	margin-top:10px;
	-webkit-border-radius: 6px;
	-moz-border-radius: 6px;
	border-radius: 6px;
	
}
.wordline3{
	font-weight:bloder;
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size:0.8cm;
	display:inline-block;
	vertical-align:middle;
	margin-left:20px;
	margin-top:10px;
	-webkit-border-radius: 6px;
	-moz-border-radius: 6px;
	border-radius: 6px;
	
}
.content_box{
position:absolute;
width:630px;
display:none;
height:90%;
overflow:auto;
}

</style>
<body>
<div class="test"></div>
<div style="display:inline-block;"><a href="http://www.ted.com" target="_blank"><img src="http://assets.tedcdn.com/images/ted_logo.gif"></img></a></div>
<div style="display:inline-block;margin-left:10px;width:300px;margin-bottom:10px;"><div class="note"><li>Find TED film from above</li><li>Paste film url link you love, </li><li>Enjoy the frequent words!</li></div></div>
<form method="post" target="./" >
<input name="link" id="link" type="text" size="100" value="<?php echo $_POST['link']; ?>">
<input type="submit" value="submit"><div class="note">Parsing might cost you 5 seconds</div>
</form>
<div id="loading"><img src="loading.gif"></img></div>
<div id="js_response"></div>
<div class="content_box"></div>

</body>
</html>
