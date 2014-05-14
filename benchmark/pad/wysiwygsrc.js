
window.resizeTo(750,510);

//sPersistValue holds the value of the saved innerHTML
var sPersistValue

var viewMode = 1;

function Init()
{
iView.document.designMode = 'On';
getSystemFonts();
getBlockFormats();

}

function selOn(ctrl)
{
ctrl.style.borderColor = 'threeddarkshadow';
ctrl.style.backgroundColor = 'threedhighlight';
ctrl.style.cursor = 'hand';
}

function selOff(ctrl)
{
ctrl.style.borderColor = 'threedface';
ctrl.style.backgroundColor = 'threedface';
}

function selDown(ctrl)
{
ctrl.style.borderColor = 'threedface';
ctrl.style.backgroundColor = 'threedface';
}

function selUp(ctrl)
{
ctrl.style.borderColor = 'threedshadow';
ctrl.style.backgroundColor = 'threedlightshadow';
}

function doToggleView()
{
if(viewMode == 1)
{
iHTML = iView.document.body.innerHTML;
iView.document.body.innerText = iHTML;

// Show  all controls
//removed style controls that were otherwise here
iView.focus();

viewMode = 2; // Code
}
else
{
iText = iView.document.body.innerText;
iView.document.body.innerHTML = iText;

// Show all controls
//removed style controls that were otherwise here
iView.focus();

viewMode = 1; // WYSIWYG
}
}

function cmdExec(cmd,opt)
{
iView.document.execCommand(cmd,"",opt);
iView.focus();
}

//preview control
//dynamic preview template
function previewControl() {
ff = window.open("","","");
ff.document.write("<html><head><title>Webpage Preview</title></head><body>"+iView.document.body.innerHTML+"</body></html>");
}

function doFont(fName)
{
if(fName != '')
iView.document.execCommand('fontname', false, fName);
}

function doSize(fSize)
{
if(fSize != '')
iView.document.execCommand('fontsize', false, fSize);
}

function doHead(hType)
{
if(hType != '')
{
iView.document.execCommand('formatblock', false, hType);
doFont(selFont.options[selFont.selectedIndex].value);
}
}

function doLink()
{
iView.document.execCommand('createlink');
}

function doRule()
{
iView.document.execCommand('inserthorizontalrule', false, null);
}

// SHELL API FOR MS NOTEPAD
function executeCommands(inputparms)
{
// Instantiate the Shell object and invoke
//its execute method.

var oShell = new ActiveXObject("Shell.Application");

var commandtoRun = "C:\\WINDOWS\\notepad.exe";
if (inputparms != "")
{
var commandParms = iView.document.value;
}

// Invoke the execute method.
oShell.ShellExecute(commandtoRun, commandParms,
"", "open", "1");
}
//ENDE SHELL API

function foreColor()
{
//----- Sets Foreground Color -----
var fColor = showModalDialog("color.html","","dialogHeight: 300px; dialogWidth: 230px; dialogTop: 200px; dialogLeft: 150px; edge: Sunken; center: Yes; help: No; resizable: No; status: No;");
if (fColor != null)
{
iView.document.execCommand("ForeColor", false, fColor);
}
iView.focus();
}

function backColor()
{
//----- Sets Background Color -----
var bColor = showModalDialog("color.html","","dialogHeight: 300px; dialogWidth: 230px; dialogTop: 200px; dialogLeft: 150px; edge: Sunken; center: Yes; help: No; resizable: No; status: No;");
if (bColor != null)
{
iView.document.execCommand("BackColor", false, bColor);
}
iView.focus();
}

 //table Dialog
function addTableDialog()
{
var rtNumRows = null;
var rtNumCols = null;
var rtTblAlign = null;
var rtTblWidth = null;

var rtTblSpacing = null;
var rtTblPadding =  null;
var rtTblColor = null;
var rtTblBorder = null;
var rtTblBorderColor = null;

showModalDialog("table.html",window,"status:no; dialogWidth: 400px; dialogHeight: 340px; help: 0");
}
function createTable()
{
var cursor = iView.document.selection.createRange();
if (rtNumRows == "" || rtNumRows == "0")
{
rtNumRows = "1";
}
if (rtNumCols == "" || rtNumCols == "0")
{
rtNumCols = "1";
}
var rttrnum=1
var rttdnum=1
var rtNewTable = "<table  bordercolor='"+rtTblBorderColor+"' border='"+rtTblBorder+"' bgcolor='"+rtTblColor+"' cellpadding='"+rtTblPadding+"' cellspacing='"+rtTblSpacing+"' border='1' align='" + rtTblAlign + "' cellpadding='0' cellspacing='0' width='" + rtTblWidth + "' >"
while (rttrnum <= rtNumRows)
{
rttrnum=rttrnum+1
rtNewTable = rtNewTable + "<tr>"
while (rttdnum <= rtNumCols)
{
rtNewTable = rtNewTable + "<td>&nbsp;</td>"
rttdnum=rttdnum+1
}
rttdnum=1
rtNewTable = rtNewTable + "</tr>"
}
rtNewTable = rtNewTable + "</table>"
cursor.pasteHTML(rtNewTable);
iView.focus();
}

function popup6(ftp,ftpref)
{
if (! window.focus)return true;
var href;
if (typeof(ftp.html) == 'string')
href=ftp.html;
else
href=ftp.html;
window.open("ftp.html", 'ftpref', 'width=320, height=320, top=100, left=240, resizable=no, directories=no, location=no, toolbar=no, status=no, menubar=no, status=no, scrollbars=no');
return false;
}

function bugsome1(){
who=prompt("Enter recipient's email address: ","bill@fromredmond.net");
what=prompt("Enter the subject: ","-say something here-");
if (confirm("Are you sure you want to mail "+who+" with the subject of "+what+"?"+"  if so, select and copy editor contents into email text area's window when it comes up")==true){
parent.location.href='mailto:'+who+'?subject='+what+'';
}
}

function alibi() {
 window.showModelessDialog("about.html" , "ProtoPad V 2.5.1" , "dialogHeight:485px; dialogWidth:320px; resizable:0; scrollbars:0; status:0 ; help:0; dialogTop=70px; dialogLeft:221px")
}

//begin help window code
//copy this code into the <HEAD> of your webpage. Make sure you specify an event for the function, e.g. onLoad="alibi()"

function helpfile() {
 window.showModelessDialog(" help.html" , "" , "dialogHeight:450px; dialogWidth:485px; resizable:yes; scrollbars:yes; status:no ; dialogTop=70px; dialogLeft:150px")
}
//ende help window code

function upper() {
str = iView.document.body.innerHTML = iView.document.body.innerHTML;
iView.document.body.innerHTML = iView.document.body.innerHTML.toUpperCase()
}

function lower() {
str = iView.document.body.innerHTML = iView.document.body.innerHTML;
iView.document.body.innerHTML = iView.document.body.innerHTML.toLowerCase()
}

//insert symbol
function mySymbol()
{
var symbol = null;
showModalDialog("symbol.html",window,"dialogHeight: 200px; dialogWidth: 170px; dialogTop: 200px; dialogLeft: 150px; edge: Sunken; center: Yes; help: No; resizable: No; status: No;");
}
function createSymbol()
{
var cursor = iView.document.selection.createRange();

var rtNewTable = ""+symbol+""

cursor.pasteHTML(rtNewTable);
iView.focus();
}

//auf wiedersehen
function finito() {
if (confirm('You may now lose any unsaved information.\n\nAre you sure you want to exit ProtoPad? '))
window.close();
else return;
}

//insert image
function insImg()
{
var imageAlt = null;
var imageSrc = null;
var units = null;
var border = null;
showModalDialog("imgsrc.html",window,"status:no; dialogWidth: 310px; dialogHeight: 147px; help: 0");
}
function addImageToPage()
{
var cursor = iView.document.selection.createRange();

var rtNewTxt = "<img src=\""+imageSrc+"\" alt='" + imageAlt + "'  border='"+border+"'>"

cursor.pasteHTML(rtNewTxt);
iView.focus();
}

//update via asp page in root directory
  function doUpdate()
{
   //----- Update User Input ------
   //==============================================
   //= To change the url that the ProtoPad posts to =
   //= change the action url in the form at the   =
   //= bottom of the page protopad.html, ie the test.asp link in the form named ppadeditor.
   //==============================================
   if (iView.document.body.innerHTML == "")
   {
      return;
   }
   else
   {
      if (confirm("Would you like to submit ProtoPad's contents\n\nto update your file?"))
      {
         var dataRep = null;
         dataRep = document.body.all.submitData;
         dataRep.value = iView.document.body.innerHTML;
         document.ppadeditor.submit();
      }
      else
      {
         return;
      }
   }
}
function noSpaces(_Str){
	for (var i=0; i< _Str.length; i++)
		while ( _Str.charCodeAt(i)<33 && i<_Str.length)
			_Str = _Str.substring(0,i) + _Str.substring(i+1);
	return _Str;
	}
function trimLeft(_Str)  {
	while (_Str.charCodeAt(0)<33 )
		_Str = (_Str.length == 1) ? "" : _Str.substring(1);
	return _Str;
	}
function trimRight(_Str)  {
	while (_Str.charCodeAt(_Str.length-1)<33 )
		_Str = (_Str.length == 1) ? "" : _Str.substring(0, _Str.length-1);
	return _Str;
	}
