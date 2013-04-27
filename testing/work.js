var click_record = {};
$(document).ready(function(){
if(ted_link.length>10){
// word cout main function
	var link = "./callback.php?url="+ted_link;
	var now = new Date();
	var nowM;
	var nowS;
	$("#loading").css("display","block");
	now = new Date();
	$(".test").append("<div class=\"test\">success "+now.getMinutes()+":"+now.getSeconds()+"<br/></div>");
	$.get(link,function(data){
		if(data=="invalid"){
			$("#loading").css("display","none");
			alert("This link is not TED film");
		}
	});	
	$.ajax({
	url: link,
	dataType: 'json',
	success: function(data){
		$("#loading").css("display","none");
		var subtitle ='';
		for(var i in data['captions']){
			subtitle += data['captions'][i]['content']+" ";
		}
		subtitle = subtitle.replace(/\:|,|\.|\\|\!|\?|\"|\-|\'|\;/g,' ');
		var words = subtitle.split(' ');
		for(var i in words){
			words[i] = words[i].toLowerCase();
		}
		var words_count = {};
		var out='';
		for(var i in words){
			if(!isStopWord(words[i]) && words[i].length>2){
				if(typeof(words_count[words[i]]) == "undefined"){
					words_count[words[i]] = 0;
				}
				words_count[words[i]]++;
			}
		}
		var words_count_sortable = [];
		var c=0;
		for(var name in words_count){
			words_count_sortable.push([name,words_count[name]]);
		}
		var result = words_count_sortable.sort(function(a,b){return b[1]-a[1]});
		/*for(var i in words_count){
			out = out + i+" : "+words_count[i]+"<br/>";
		}*/
		out = "<table>";
		for(var i in result){
			out = out+"<tr><td><div id='"+result[i][0]+"' class='wordline'>"+result[i][0]+"</div></td><td><div class='wordline2'> : </div></td><td><div class='wordline3'>"+result[i][1]+"</div></td></tr>";
		}
		out = out+"</table>";
		$(".content_box").append(out);
		$(".note").css("display","none");
		now = new Date();
		nowM = now.getMinutes();
		nowS = now.getSeconds();
		
		// click function
		$(".wordline").click(function(){
		var id =$(this).attr("id");
		
		if(typeof(click_record[id]) ==  "undefined")
			click_record[id]=0;
			
		if(click_record[id]%2==0)
			$(this).css("background-color","rgba(255, 0, 41, 0.06)");
		else
			$(this).css("background-color","rgba(0, 235, 255, 0.06)");
		click_record[id]++;
	});
	}
	})
	.done(function(){
		$(".test").append("<div class=\"test\">success "+nowM+":"+nowS+"<br/></div>");
		$(".content_box").slideDown("show");
	})
	.fail(function(){$(".test").append(
		"<div class=\"test\">error "+nowM+":"+nowS+"<br/></div>");
	})
	.always(function(){$(".test").append("<div class=\"test\">done "+nowM+":"+nowS+"<br/></div>");})
}

});


var stopWords = new Array("", "a", "about", "above", "above", "across", "after", "afterwards", "again", "against", "all", "almost", "alone", "along", "already", "also","although","always","am","among", "amongst", "amoungst", "amount",  "an", "and", "another", "any","anyhow","anyone","anything","anyway", "anywhere", "are", "around", "as",  "at", "back","be","became", "because","become","becomes", "becoming", "been", "before", "beforehand", "behind", "being", "below", "beside", "besides", "between", "beyond", "bill", "both", "bottom","but", "by", "call", "can", "cannot", "cant", "co", "con", "could", "couldnt", "cry", "de", "describe", "detail", "do", "done", "down", "due", "during", "each", "eg", "eight", "either", "eleven","else", "elsewhere", "empty", "enough", "etc", "even", "ever", "every", "everyone", "everything", "everywhere", "except", "few", "fifteen", "fify", "fill", "find", "fire", "first", "five", "for", "former", "formerly", "forty", "found", "four", "from", "front", "full", "further", "get", "give", "go", "had", "has", "hasnt", "have", "he", "hence", "her", "here", "hereafter", "hereby", "herein", "hereupon", "hers", "herself", "him", "himself", "his", "how", "however", "hundred", "i", "ie", "if", "in", "inc", "indeed", "interest", "into", "is", "it", "its", "itself", "keep", "last", "latter", "latterly", "least", "less", "ltd", "made", "many", "may", "me", "meanwhile", "might", "mill", "mine", "more", "moreover", "most", "mostly", "move", "much", "must", "my", "myself", "name", "namely", "neither", "never", "nevertheless", "next", "nine", "no", "nobody", "none", "noone", "nor", "not", "nothing", "now", "nowhere", "of", "off", "often", "on", "once", "one", "only", "onto", "or", "other", "others", "otherwise", "our", "ours", "ourselves", "out", "over", "own","part", "per", "perhaps", "please", "put", "rather", "re", "same", "see", "seem", "seemed", "seeming", "seems", "serious", "several", "she", "should", "show", "side", "since", "sincere", "six", "sixty", "so", "some", "somehow", "someone", "something", "sometime", "sometimes", "somewhere", "still", "such", "system", "take", "ten", "than", "that", "the", "their", "them", "themselves", "then", "thence", "there", "thereafter", "thereby", "therefore", "therein", "thereupon", "these", "they", "thickv", "thin", "third", "this", "those", "though", "three", "through", "throughout", "thru", "thus", "to", "together", "too", "top", "toward", "towards", "twelve", "twenty", "two", "un", "under", "until", "up", "upon", "us", "very", "via", "was", "we", "well", "were", "what", "whatever", "when", "whence", "whenever", "where", "whereafter", "whereas", "whereby", "wherein", "whereupon", "wherever", "whether", "which", "while", "whither", "who", "whoever", "whole", "whom", "whose", "why", "will", "with", "within", "without", "would", "yet", "you", "your", "yours", "yourself", "yourselves", "the");

function isStopWord(s){
	if($.inArray(s,stopWords)<0) {
		return false;
	}
	else {
		return true;
	}
}