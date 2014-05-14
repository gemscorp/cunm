<html>
<head>

<title>::::::: ProtoPad V 2.5.1 :::::::</title>


<script src="richexit.js" type="text/javascript"></script>

<link rel="stylesheet" type="text/css" href="stylesheet.css" />

<style type="text/css">
<!--
.nobs {  cursor: hand}
-->
</style>


<script language="JavaScript">
<!--
	var format="HTML"
	var sStatusBarMes = "Current View WYSIWYG"; 
	var tmpFontFamily
	var tmpFontSize
	var tmpBgColor1
	var tmpText
	var tmpBgColor3
	var framingStatus = 0
	var imageWin
	var tableWin
	var linkWin
	var zoomValue = 100;
	
	var inputMethod = 2; 
	var useRelPaths = 0; 
	var useCSS = ""; 
	var Ok = "false"
	var name =  navigator.appName
	var version =  parseFloat(navigator.appVersion)
	var platform = navigator.platform

	if (platform == "Win32" && name == "Microsoft Internet Explorer" && version >= 4){
		Ok = "true";	
	} else {
		alert('Caution: This editor uses ActiveX and must be run on Windows95 and later and with Internet Explorer 5.5 and later.');
	}

		
	//document.write('<form name="fHtmlEditor" method="POST" action="_editor.php" style="margin:0px;">'); 
	

function setFocus() {
	iView.focus()
}

	
function Init()
{
iView.document.designMode = 'On';
}

	function newDoc() {
		iView.document.open();
		iView.document.write("");
		iView.document.close();
	
		setFocus();
	}


	function initEditor() {
	pool.document.body.innerHTML = window.opener.document.getElementById("<?=$id?>").value; 	

			
		iView.document.designMode="On";
		iView.document.open();

		if(inputMethod == 5) {
			var htmlString = pool.document.documentElement.outerHTML;
		} else {
			var htmlString = pool.document.body.innerHTML;
		}

		iView.document.write(htmlString);
		iView.document.close()
		setFocus();

		setFocus();
		//updateStatusBar();
		selFont.selectedIndex=10;
		selSize.selectedIndex=2;
		doFont("MS Sans Serif");
		doSize(2);
	}

	function copyValue() {
		var theHtml = iView.document.documentElement.outerHTML;
		pool.document.open();
		pool.document.write(theHtml);
		pool.document.close();
		
	}

	
	function filteredOutput(pool) {
		if(useRelPaths == 1) {
			//pool = pool.replace(new RegExp('http://www.labs4.com','g'),'.');
			
			pool = pool.replace(new RegExp('&amp;','g'),'&');
		}
		
		return pool
	}
	
	
	function OnFormSubmit() {
		
			//if(confirm("This Document is about to be submitted  Are you sure you have finished editing?")) {
			
				if(framingStatus == 1) CssFramingOff();
				copyValue();
				closeChildWins()

				window.opener.document.getElementById("<?=$id?>").value = filteredOutput(pool.document.body.innerHTML); self.close(); 			
			//}

	
	}

	function populateCSS() {
		if (window.frames('iView').document.styleSheets && (window.frames('iView').document.readyState == 'complete')) {

			var otitle, title="";
			for(var i=0; i<iView.document.styleSheets(0).rules.length; i++) {
				var title = iView.document.styleSheets(0).rules.item(i).selectorText;
					if (title != "" && title != otitle) {

						if(!approvedCSS(title)) {
							var title2 = title.replace(".","");
							document.fHtmlEditor.css_style.options[document.fHtmlEditor.css_style.options.length] = new Option(title, title2);
						}
						otitle=title;
					}
			}
		}
	var newOption = new Option('update CSS list','update_list');
	document.fHtmlEditor.css_style.options[document.fHtmlEditor.css_style.options.length] = newOption;
	newOption.className = "select_update";
	}

	function updateCSS() {
		// clear current style selector
		document.fHtmlEditor.css_style.options.length = 0;
		document.fHtmlEditor.css_style.options[document.fHtmlEditor.css_style.options.length] = new Option('CSS Style','');
		populateCSS();
	}

	function approvedCSS(title) {
		var o;

		o = title.indexOf(title.toLowerCase('a.'))
		if(o > -1) return false;

		var approvalArr = new Array("#","input","select","option","textarea","button","body","thead","tbody","tfoot","table","th","tr","td","font","span","form","fieldset","legend","hr","li","ol","ul","p","h1","h2","h3","h4","h5","h6");

		for(var i=0; i<approvalArr.length; i++) {
			o = title.indexOf(title.toLowerCase(approvalArr[i]))
			if(o == 0) return false;
		}
		return true;	
	}


	function switchFraming() {
		if(framingStatus == 0) {
			CssFramingOn();
			framingStatus = 1;
			iView.focus();
			} else {
			CssFramingOff();
			framingStatus = 0;
			location.reload;
			iView.focus();
		}
	}

	function CssFramingOn() {
		var tEdit;
		if (!iView.document.body.BehaviorStyleSheet){
			iView.document.body.BehaviorStyleSheet = iView.document.createStyleSheet()
		}
		tEdit = iView.document.body.BehaviorStyleSheet;
		tEdit.addRule('TD','border:1px dashed silver;');
		tEdit.addRule('Table','border:1px dashed silver;');
		tEdit.addRule('TD.claim','border:1px dashed #CE0000;');
		tEdit.addRule('Table.claim','border:1px dashed #CE0000;');
	}

	function CssFramingOff() {
		var tEdit;
		tEdit = iView.document.body.BehaviorStyleSheet;
		tEdit.removeRule('TD','border:1px dashed silver;');
		tEdit.removeRule('Table','border:1px dashed silver;');
		tEdit.removeRule('TD.claim','border:1px dashed #CE0000;');
		tEdit.removeRule('Table.claim','border:1px dashed #CE0000;');
	}

	function closeChildWins() {
		if (imageWin) imageWin.close()
		if (linkWin) linkWin.close()
		if (tableWin) tableWin.close()
	}


	function updateStatusBar() {
		statusMessage = window.status = sStatusBarMes;
		statusMessage += "   |   zoom: " + Math.round(zoomValue) + "%"; 
		window.status = statusMessage;
	}

	

//-->
</script>

<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
          //make sure to specify the proper <ILAYER> name, i.e. the one you have used for your app
          //SaveDocument uses the common dialog box object to display the save as dialog, then writes a textstream object from the value of the div's innerHTML property
          //Setting CancelError to true and using try/catch allows the user to click cancel on the save as dialog without causing a script error
     function saveAsDialog(){
     cDialog.CancelError=true;
     try{
     cDialog.Filter="HTML Files (*.html)|*.html|Form Files (*.frm)|*.frm|Text Files (*.txt)|*.txt|All Files (*.*)|*.*"
     cDialog.ShowSave();
     var fso = new ActiveXObject("Scripting.FileSystemObject");
     var f = fso.CreateTextFile(cDialog.filename, true);
     f.write('<html>\n<head>\n<title>My Webpage</title>\n<\head>\n<body>' + iView.document.body.innerHTML + '\n</body>\n</html>');
     f.Close();
     sPersistValue=iView.document.body.innerHTML;}
     catch(e){
     var sCancel="true";
     return sCancel;}
     iView.focus();
     }
</SCRIPT>

<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
          //make sure to specify the proper <ILAYER> name, i.e. the one you have used for your app
          //open dialog
          //LoadDocument uses the common dialog box object to display the open dialog box, then reads the file and displays its contents in the div
          //Setting CancelError to true and using try/catch allows the user to click cancel on the save as dialog without causing a script error
          function LoadDocument(){
          cDialog.CancelError=true;
          try{
          cDialog.Filter="HTML Files (*.html)|*.html|Text Files (*.txt)|*.txt|All Files (*.*)|*.*"
          cDialog.ShowOpen();
          var ForReading = 1;
          var fso = new ActiveXObject("Scripting.FileSystemObject");
          var f = fso.OpenTextFile(cDialog.filename, ForReading);
          var r = f.ReadAll();
          f.close();
          iView.document.body.innerHTML=r;
          //This variable is used in the checkForSave function to see if there is new content in the div
          sPersistValue=iView.document.body.innerHTML;}
          catch(e){
          var sCancel="true";
          return sCancel;}
          iView.focus();
          }
          </SCRIPT>

</head>

<body bgcolor="buttonface" onLoad=" initEditor(), iView.focus();" topmargin="0" leftmargin="0" >

       <!-- begin editor -->
<center>
<!-- toolbar table -->
<table id="toolbarCtrls" width="100%" height="25px" border="1" cellspacing="0" cellpadding="0" bgcolor="buttonface" style="border-collapse: collapse" bordercolor="#111111">
<tr valign="top">
<td class="toolz" align="left" valign="middle" width="473" ><!-- toolbar table row1 -->
		<!-- grabber -->
		<img src="separator-header.gif" valign="middle" border="0" width="5" height="18"><!-- Save --><img alt="Save" class="nobs" src="save.gif" border="0" alt="save" onFocus="this.blur()" onMouseOver="selOn(this)" onMouseOut="selOff(this)" onMouseDown="selDown(this)" onMouseUp="selUp(this)" title="Save" onClick="OnFormSubmit() " width="23" height="22"> <!-- Undo -->
<img alt="Undo" class="nobs" src="undo.gif" border="0" onFocus="this.blur()" onMouseOver="selOn(this)" onMouseOut="selOff(this)" onMouseDown="selDown(this)" onMouseUp="selUp(this)" title="Undo" onClick="cmdExec('Undo')" width="23" height="22">
		<!-- Redo -->
		<img alt="Redo" class="nobs" src="redo.gif" border="0" onFocus="this.blur()" onMouseOver="selOn(this)" onMouseOut="selOff(this)" onMouseDown="selDown(this)" onMouseUp="selUp(this)" title="Redo" onClick="cmdExec('Redo')" width="23" height="22">
		<!--  SelectAll -->
		<img alt="SelectAll" class="nobs" src="select.gif" border="0" onFocus="this.blur()" onMouseOver="selOn(this)" onMouseOut="selOff(this)" onMouseDown="selDown(this)" onMouseUp="selUp(this)" title="SelectAll" onClick="cmdExec('SelectAll')" width="23" height="22">
		<!-- Cut -->
		<img alt="Cut" class="nobs" src="cut.gif" border="0" onFocus="this.blur()" onMouseOver="selOn(this)" onMouseOut="selOff(this)" onMouseDown="selDown(this)" onMouseUp="selUp(this)" title="Cut" onClick="cmdExec('Cut')" width="23" height="22">
		<!-- Copy -->
		<img alt="Copy" class="nobs" src="copy.gif" border="0" onFocus="this.blur()" onMouseOver="selOn(this)" onMouseOut="selOff(this)" onMouseDown="selDown(this)" onMouseUp="selUp(this)" title="Copy" onClick="cmdExec('Copy')" width="23" height="22">
		<!-- Paste -->
		<img alt="Paste" class="nobs" src="paste.gif" border="0" onFocus="this.blur()" onMouseOver="selOn(this)" onMouseOut="selOff(this)" onMouseDown="selDown(this)" onMouseUp="selUp(this)" title="Paste" onClick="cmdExec('Paste')" width="23" height="22">
		<img src="separator.gif" border="0" width="5" height="22">&nbsp;
		<!-- Bold -->
		<img alt="Bold" class="nobs" src="bold.gif" border="0" onFocus="this.blur()" onMouseOver="selOn(this)" onMouseOut="selOff(this)" onMouseDown="selDown(this)" onMouseUp="selUp(this)" title="Bold" onClick="cmdExec('Bold')" width="23" height="22">
		<!-- Italic -->
		<img alt="Italic" class="nobs" src="italic.gif" border="0" onFocus="this.blur()" onMouseOver="selOn(this)" onMouseOut="selOff(this)" onMouseDown="selDown(this)" onMouseUp="selUp(this)" title="Italic" onClick="cmdExec('Italic')" width="23" height="22">
		<!-- Underline -->
		<img alt="Underline" class="nobs" src="underline.gif" border="0" onFocus="this.blur()" onMouseOver="selOn(this)" onMouseOut="selOff(this)" onMouseDown="selDown(this)" onMouseUp="selUp(this)" title="Underline" onClick="cmdExec('Underline')" width="23" height="22">
		<!-- Strikethrough -->
		<img alt="Strikethrough" class="nobs" src="strikethrough.gif" border="0" onFocus="this.blur()" onMouseOver="selOn(this)" onMouseOut="selOff(this)" onMouseDown="selDown(this)" onMouseUp="selUp(this)" title="Strikethrough" onClick="cmdExec('StrikeThrough')" width="23" height="22">
		<!--   Left -->
		<img alt="Left" class="nobs" src="left.gif" border="0" onFocus="this.blur()" onMouseOver="selOn(this)" onMouseOut="selOff(this)" onMouseDown="selDown(this)" onMouseUp="selUp(this)" title="Left" onClick="cmdExec('Justifyleft')" width="23" height="22">
		<!-- Center -->
		<img alt="Center" class="nobs" src="centre.gif" border="0" onFocus="this.blur()" onMouseOver="selOn(this)" onMouseOut="selOff(this)" onMouseDown="selDown(this)" onMouseUp="selUp(this)" title="Center" onClick="cmdExec('Justifycenter')" width="23" height="22">
		<!--  Right -->
		<img alt="Right" class="nobs" src="right.gif" border="0" onFocus="this.blur()" onMouseOver="selOn(this)" onMouseOut="selOff(this)" onMouseDown="selDown(this)" onMouseUp="selUp(this)" title="Right" onClick="cmdExec('JustifyRight')" width="23" height="22">
		<!--  Ordered List -->
		<img alt="Ordered List" class="nobs" src="orderlist.gif" border="0" onFocus="this.blur()" onMouseOver="selOn(this)" onMouseOut="selOff(this)" onMouseDown="selDown(this)" onMouseUp="selUp(this)" title="Ordered List" onClick="cmdExec('Insertorderedlist')" width="23" height="22">
		<!-- Bulleted List -->
		<img alt="Bulleted List" class="nobs" src="bulletlist.gif" border="0" onFocus="this.blur()" onMouseOver="selOn(this)" onMouseOut="selOff(this)" onMouseDown="selDown(this)" onMouseUp="selUp(this)" title="Bulleted List" onClick="cmdExec('Insertunorderedlist')" width="23" height="22"> </td>
		</tr>
		<tr><!-- toolbar table row2 -->
		<td class="toolz" align="left" valign="middle" width="473">
		<!-- grabber -->
		<img src="separator-header.gif" valign="middle" border="0" width="5" height="18">
		<!-- Make Text UpperCase -->
		<img alt="Make Text UpperCase" class="nobs" src="upper.gif" border="0" onFocus="this.blur()" onMouseOver="selOn(this)" onMouseOut="selOff(this)" onMouseDown="selDown(this)" onMouseUp="selUp(this)" title="Make Text UpperCase" onClick="upper()" width="23" height="22">
		<!-- Make Text Lowercase -->
		<img alt="Make Text LowerCase" class="nobs" src="lower.gif" border="0" onFocus="this.blur()" onMouseOver="selOn(this)" onMouseOut="selOff(this)" onMouseDown="selDown(this)" onMouseUp="selUp(this)" title="Make Text Lowercase" onClick="lower()" width="23" height="22">
		<!-- SuperScript -->
		<img alt="SuperScript" class="nobs" src="superscript.gif" border="0" onFocus="this.blur()" onMouseOver="selOn(this)" onMouseOut="selOff(this)" onMouseDown="selDown(this)" onMouseUp="selUp(this)" title="SuperScript" onClick="cmdExec('SuperScript')" width="23" height="22">
		<!-- SubScript -->
		<img alt="SubScript" class="nobs" src="subscript.gif" border="0" onFocus="this.blur()" onMouseOver="selOn(this)" onMouseOut="selOff(this)" onMouseDown="selDown(this)" onMouseUp="selUp(this)" title="SubScript" onClick="cmdExec('SubScript')" width="23" height="22">
		<!-- Add Horizontal Rule -->
		<img alt="Add Horizontal Rule" class="nobs" src="hr.gif" border="0" onFocus="this.blur()" onMouseOver="selOn(this)" onMouseOut="selOff(this)" onMouseDown="selDown(this)" onMouseUp="selUp(this)" title="Add Horizontal Rule" onClick="doRule()" width="23" height="22">
		<!-- Text Color -->
		<img alt="Text Color" class="nobs" src="color.gif" border="0" onFocus="this.blur()" onMouseOver="selOn(this)" onMouseOut="selOff(this)" onMouseDown="selDown(this)" onMouseUp="selUp(this)" title="Text Color" onClick="foreColor()" width="23" height="22"/>
		<!-- Text BG Color -->
		<img alt="Text BG Color" class="nobs" src="fontback.gif" border="0" onFocus="this.blur()" onMouseOver="selOn(this)" onMouseOut="selOff(this)" onMouseDown="selDown(this)" onMouseUp="selUp(this)" title="Text BG Color" onClick="backColor()" width="23" height="22"/>
		<!-- Insert Symbol	 -->
		<img alt="Insert Symbol" class="nobs" src="symbol.gif" width="23" height="22" border="0" onFocus="this.blur()" onMouseOver="selOn(this)" onMouseOut="selOff(this)" onMouseDown="selDown(this)" onMouseUp="selUp(this)" title="Symbol" onClick="mySymbol()">
		<img src="separator.gif" border="0" width="5" height="22"><img src="separator.gif" border="0" width="5" height="22">&nbsp;
		<!-- Unindent -->
		<img alt="Unindent" class="nobs" src="outdent.gif" border="0" onFocus="this.blur()" onMouseOver="selOn(this)" onMouseOut="selOff(this)" onMouseDown="selDown(this)" onMouseUp="selUp(this)" title="Unindent" onClick="cmdExec('Outdent')" width="23" height="22">
		<!-- Indent -->
		<img alt="Indent" class="nobs" src="indent.gif" border="0" onFocus="this.blur()" onMouseOver="selOn(this)" onMouseOut="selOff(this)" onMouseDown="selDown(this)" onMouseUp="selUp(this)" title="Indent" onClick="cmdExec('Indent')" width="23" height="22">
		<!-- grabber -->
		&nbsp;</td>
		</tr>
		<tr>
		<td class="toolz" align="left" valign="middle" width="473">
		   &nbsp;<select name="selFont" onChange="doFont(this.options[this.selectedIndex].value)" style="font: 8pt verdana;">
		<option style="background-color:buttonface;" value="">Font Style</option>
		
		<option style="background-color:buttonface;" value="Arial">Arial</option>
		<option style="background-color:buttonface;" value="Arial Black">Arial 
        Black</option>
		<option style="background-color:buttonface;" value="Arial Narrow">Arial 
        Narrow</option>
		<option style="background-color:buttonface;" value="Century Schoolbook">
        Century Schoolbook</option>
		<option style="background-color:buttonface;" value="Comic Sans MS">Comic 
        Sans MS</option>
		<option style="background-color:buttonface;" value="Courier New">Courier 
        New</option>
		<option style="background-color:buttonface;" value="Engravers MT">
        Engravers MT</option>
		<option style="background-color:buttonface;" value="Franklin Gothic Demi">
        Franklin Gothic Demi</option>
		<option style="background-color:buttonface;" value="Georgia">Georgia</option>
		<option style="background-color:buttonface;" value="MS Sans Serif">MS Sans Serif</option>
		<option style="background-color:buttonface;" value="Sans Serif">Sans 
        Serif</option>
		<option style="background-color:buttonface;" value="System">System</option>
		<option style="background-color:buttonface;" value="Tahoma">Tahoma</option>
		<option style="background-color:buttonface;" value="Times New Roman">
        Times New Roman</option>
		<option style="background-color:buttonface;" value="Trebuchet MS">
        Trebuchet MS</option>
		<option style="background-color:buttonface;" value="Verdana">Verdana</option>
		</select>
		<select name="selSize" onChange="doSize(this.options[this.selectedIndex].value);" style="font: 8pt verdana;">
		<option style="background-color:buttonface;" value="">Font Size</option>
		<option style="background-color:buttonface;" value="1">1</option>
		<option style="background-color:buttonface;" value="2">2</option>
		<option style="background-color:buttonface;" value="3">3</option>
		<option style="background-color:buttonface;" value="4">4</option>
		<option style="background-color:buttonface;" value="5">5</option>
		<option style="background-color:buttonface;" value="6">6</option>
		<option style="background-color:buttonface;" value="7">7</option>
		<option style="background-color:buttonface;" value="+1">+1</option>
		<option style="background-color:buttonface;" value="+2">+2</option>
		<option style="background-color:buttonface;" value="+3">+3</option>
		<option style="background-color:buttonface;" value="+4">+4</option>
		<option style="background-color:buttonface;" value="+5">+5</option>
		<option style="background-color:buttonface;" value="+6">+6</option>
		<option style="background-color:buttonface;" value="+7">+7</option>
		</select> </td>
		</tr>
		</table>
		
		<!-- iframe -->
		<iframe id="iView" trusted="yes" width="100%" height="85%" border="1">
		</iframe> </div>
		
			<!-- start of pool section -->
			<IFRAME ID="pool" width="0" height="0" style="display: none;" frameborder="0" noresize scrolling="no"></IFRAME>
			<!-- end of pool section -->
							
	</body>
</html>