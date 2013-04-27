<html>
<head>
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
<title>TED subtitled words</title></head>
<style type="text/css">
.text{
	font-weight:bloder;
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size:0.8cm;
	display:inline-block;
	vertical-align:middle;
}
</style>
<body>
<!-- <img src="http://assets.tedcdn.com/images/ted_logo.gif"> -->
<div style="width:99%">
<a href="http://tedtalksubtitledownload.appspot.com/" target="_blank"><div style="width:49%;"class="text">ted subtitled download website</div></a><a href="./instructions.html" target="_blank"><div class="text" style="width:49%;margin-right:0%;text-align:right;display:inline-block;">---Instructions---</div></a><br/>
</div>
<div style="display:block;width:99%;vertical-align:middle;">
<div style="width:60%;display:inline-block;vertical-align:middle;">
<form name="input" id="input" action="./index.php" method="post">
<div class="text">paste from above link<input type="text" name="link" id="link" size="100"/>
<input type="submit" value="submit"/></div></div>
<div style="vertical-align:middle;text-align:right;display:inline-block;width:39%;"><a href="http://www.ted.com/" target="_blank"><img src="http://assets.tedcdn.com/images/ted_logo.gif"></a></div></div>
</form>

<?php
if(!empty($_POST['link'])){
	$result = file_get_contents($_POST['link']);
	$array = explode("\n",$result);
	$line=0;
	$string="";
	foreach($array as $term){
		$line++;
		$i = $line%4;
		if($i == 3){
			//echo $term."<br/>";
			$string = $string.$term." ";
		}
	}
	$replace = array(",",".","-",'"',"?",'\'');
	$string = str_replace($replace,' ',$string);
	$words = wordC(explode(' ',$string));
	//var_dump($words);
	?><table><?php
	while (list($key, $val) = each($words)) {
		echo "<tr><td><div class=\"text\">$key </div></td><td><div class=\"text\">=> </div></td><td><div class=\"text\">$val</div></td></tr>";
	}
	?></div></table><?php
}else{
	echo "waiting for link<br/>";
}
?>
</body>
</html>
<?php
function wordC($a){
	$stopWords = getStopWords();
	foreach($a as $word){
		$word = strtolower($word);
		if(strlen($word)>2 && !in_array($word,$stopWords)){
			if(empty($ans[$word]) || $ans[$word]<0){
				$ans[$word]=0;
			}
			$ans[$word]+=1;
		}
	}
	arsort($ans);
	return $ans;
}
function getStopWords(){
$stopwords = array("", "a", "about", "above", "above", "across", "after", "afterwards", "again", "against", "all", "almost", "alone", "along", "already", "also","although","always","am","among", "amongst", "amoungst", "amount",  "an", "and", "another", "any","anyhow","anyone","anything","anyway", "anywhere", "are", "around", "as",  "at", "back","be","became", "because","become","becomes", "becoming", "been", "before", "beforehand", "behind", "being", "below", "beside", "besides", "between", "beyond", "bill", "both", "bottom","but", "by", "call", "can", "cannot", "cant", "co", "con", "could", "couldnt", "cry", "de", "describe", "detail", "do", "done", "down", "due", "during", "each", "eg", "eight", "either", "eleven","else", "elsewhere", "empty", "enough", "etc", "even", "ever", "every", "everyone", "everything", "everywhere", "except", "few", "fifteen", "fify", "fill", "find", "fire", "first", "five", "for", "former", "formerly", "forty", "found", "four", "from", "front", "full", "further", "get", "give", "go", "had", "has", "hasnt", "have", "he", "hence", "her", "here", "hereafter", "hereby", "herein", "hereupon", "hers", "herself", "him", "himself", "his", "how", "however", "hundred", "i", "ie", "if", "in", "inc", "indeed", "interest", "into", "is", "it", "its", "itself", "keep", "last", "latter", "latterly", "least", "less", "ltd", "made", "many", "may", "me", "meanwhile", "might", "mill", "mine", "more", "moreover", "most", "mostly", "move", "much", "must", "my", "myself", "name", "namely", "neither", "never", "nevertheless", "next", "nine", "no", "nobody", "none", "noone", "nor", "not", "nothing", "now", "nowhere", "of", "off", "often", "on", "once", "one", "only", "onto", "or", "other", "others", "otherwise", "our", "ours", "ourselves", "out", "over", "own","part", "per", "perhaps", "please", "put", "rather", "re", "same", "see", "seem", "seemed", "seeming", "seems", "serious", "several", "she", "should", "show", "side", "since", "sincere", "six", "sixty", "so", "some", "somehow", "someone", "something", "sometime", "sometimes", "somewhere", "still", "such", "system", "take", "ten", "than", "that", "the", "their", "them", "themselves", "then", "thence", "there", "thereafter", "thereby", "therefore", "therein", "thereupon", "these", "they", "thickv", "thin", "third", "this", "those", "though", "three", "through", "throughout", "thru", "thus", "to", "together", "too", "top", "toward", "towards", "twelve", "twenty", "two", "un", "under", "until", "up", "upon", "us", "very", "via", "was", "we", "well", "were", "what", "whatever", "when", "whence", "whenever", "where", "whereafter", "whereas", "whereby", "wherein", "whereupon", "wherever", "whether", "which", "while", "whither", "who", "whoever", "whole", "whom", "whose", "why", "will", "with", "within", "without", "would", "yet", "you", "your", "yours", "yourself", "yourselves", "the");

return $stopwords;
}