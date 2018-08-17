var t = 0;

var $pop = $('#popUp');

var TT = 0;
var GG = 0;
$(document).ready(function() {
$("#notification-dropdown").hover(function(e) {
	var $btn = $('button', this);
	if (!$btn.hasClass('clicked')) {
		$btn.css("backgroundColor", e.type == 'mouseenter' ? "#fff" : '#9d9d9d');
	}
		}).click(function() {
			$('button', this).addClass('clicked').css("backgroundColor", 'red');
			})
	});
$("#close").click(function() {
  $("#popUp").css("margin-left", "-625px");
  $("#plus").css("margin-left", "0px");

});
function callback() {
TT++;
if(TT>0 && GG<1){
var lable = document.getElementById("warning");
		lable.style.display = "block";
}
return false;
};
function myFunction0() {
$("#plus").css("margin-left", "0px");
console.log("LAZ window loaded");
};

function myFunction1() {
		document.getElementById("textarea").addEventListener("click", callback, true);
if (GG <1){
	var $pop = $('#popUp'),
			  $agree = $('#agree');
	$pop.show();
myOpen();
	  $("#close").click(function() {
	    $("#popUp").css("margin-left", "-625px");
	    $("#plus").css("margin-left", "0px");
	  });
		$(document).ready(function() {
	  $("#notification-dropdown").hover(function(e) {
	    var $btn = $('button', this);
	    if (!$btn.hasClass('clicked')) {
	      $btn.css("backgroundColor", e.type == 'mouseenter' ? "#fff" : '#ECECEC');
	    }
	  }).click(function() {
	    $('button', this).addClass('clicked').css("backgroundColor", '#fff');
			$('button', this).value="Close Curtain";
			GG++;
			myClose();
	  })
	});
}
else{
}
	};

function myFunction2() {
	var $pop = $('#popUp'),
			  $agree = $('#agree');
	$pop.show();
myOpen();
	  $("#close").click(function() {
	    $("#popUp").css("margin-left", "-625px");
	    $("#plus").css("margin-left", "0px");
	  });
		$(document).ready(function() {
	  $("#notification-dropdown").hover(function(e) {
	    var $btn = $('button', this);
	    if (!$btn.hasClass('clicked')) {
	      $btn.css("backgroundColor", e.type == 'mouseenter' ? "yellow" : '#ECECEC');
	    }
	  }).click(function() {
	    $('button', this).addClass('clicked').css("backgroundColor", '#fff');
			document.getElementById("button").value="dissagree";
			GG++;
			myClose();
	  })
	});
	};

	function myFunction3() {
			var checkBox = document.getElementById("privacyPolicy");
			var text = document.getElementById("button");
			var text2 = document.getElementById("h1");
			if (checkBox.checked == true)
					text.style.display = "block";
		else
				 text.style.display = "none";
};

function myOpen()
{
	$("#popUp").css("margin-left", "0px");
	    $("#plus").css("margin-left", "-625px");
};
function myClose()
{
	$("#popUp").css("margin-left", "-625px");
	$("#plus").css("margin-left", "0px");

};
function myFunction6() {
      $pop = $('#popUp');
      $pop.show();
};
function myFunction4() {
    $("#popUp").css("margin-left", "-625px");
    $("#plus").css("margin-left", "0px");
};
