'GET COMPUTER DESCRIPTION
'Reference: http://forum.sysinternals.com/display-computer-description_topic11157.html
strDescription="."
Set objWMIService = GetObject("winmgmts:\\" & strDescription & "\root\cimv2")
Set colItems = objWMIService.ExecQuery("SELECT Description FROM Win32_OperatingSystem",,48)
For Each objItem in colItems
 'Wscript.Echo"" & objItem.Description
 strDescription = strDescription & objItem.Description
Next

'PARSE INFORMATION

'Get Computer Name
'Reference: http://www.robvanderwoude.com/vbstech_network_names_computer.php
'Set wshShell = CreateObject( "WScript.Shell" )
'strComputerName = wshShell.ExpandEnvironmentStrings( "%COMPUTERNAME%" )
vasplit=Split(strDescription," ")
vasplit(0)=Replace(vasplit(0),".","") 'Remove the period set before
if InStr(1,strDescription,"TESTR1-BK6")>0 then
	strComputerName="R1-BK6"
elseif InStr(1,strDescription,"PUBSCAN")>0 then
	strComputerName=Replace(vasplit(0),"PUBSCAN","")
elseif InStr(1,strDescription,"PUBSPEC")>0 then
	strComputerName=Replace(vasplit(0),"PUBSPEC","")
elseif InStr(1,strDescription,"PUBWIDE20")>0 then
	strComputerName=Replace(vasplit(0),"PUBWIDE20","")
elseif InStr(1,strDescription,"R1-IC1")>0 then
	strComputerName="R1-IC1"
elseif InStr(1,strDescription,"PUBWIDE")>0 then
	strComputerName=Replace(vasplit(0),"PUBWIDE","")	
elseif InStr(1,strDescription,"PUBSCAN")>0 then
	strComputerName=Replace(vasplit(0),"PUBSCAN","")
elseif InStr(1,strDescription,"PUB")>0 then
	strComputerName=Replace(vasplit(0),"PUB","")
end if




'Get Configuration
strConfiguration="."

if InStr(1,strDescription,"R1-IC1")>0 then
	strConfiguration="Special Apps Station"
elseif InStr(1,strDescription,"TESTR1-BK6")>0 then
	strConfiguration="Legacy Apps Station"	
elseif InStr(1,strDescription,"PUBSCAN")>0 then
	strConfiguration="Scanner Stations"
elseif InStr(1,strDescription,"PUBSPEC")>0 then
	strConfiguration="Digital Media Studio"
else
	strConfiguration="Standard PC"
end if









'Get Floor
if InStr(1,strDescription,"R1-")>0 then
	strFloor="RaynorFirst"
end If
	
if InStr(1,strDescription,"R2-")>0 then
	strFloor="RaynorSecond"
end If

if InStr(1,strDescription,"R0-")>0 then
	strFloor="RaynorLower"
end If

if InStr(1,strDescription,"M2-")>0 then
	strFloor="Memorial"
end If


	
	
'START HTTPPOST REQUEST 
Dim strserversite
Dim strwebsite

strserversite = "52.39.251.146"
strwebsite = "www.marquette.edu"

If CheckSite(strwebsite) Then
    'WScript.Echo "connected to " & strwebsite
	If CheckSite(strserversite) Then 
		'WScript.Echo "connected to " & strserversite
		'URL to open, specify your domain for your server....
		sUrl = "http://52.39.251.146/ComputerAvailability/ComputerAvailability/statuschange.php"
		'POST Request to send.
		sRequest = "status=1&workstation=" & strComputerName & "&configuration=" &strConfiguration & "&floor=" &strFloor 
		HTTPPost sUrl, sRequest
	Else
		'WScript.Echo "can't connect to " & strserversite
		Wscript.Quit
	End If
Else
    'WScript.Echo "can't connect to " & strwebsite
	Wscript.Quit
End If








Function CheckSite(myWebsite)
'Reference http://www.robvanderwoude.com/vbstech_internet_website.php
    Dim intStatus, objHTTP

    Set objHTTP = CreateObject( "WinHttp.WinHttpRequest.5.1" )

    objHTTP.Open "GET", "http://" & myWebsite & "/", False
    objHTTP.SetRequestHeader "User-Agent", "Mozilla/4.0 (compatible; MyApp 1.0; Windows NT 5.1)"

    On Error Resume Next

    objHTTP.Send
    intStatus = objHTTP.Status

    On Error Goto 0

    If intStatus = 200 Then
        CheckSite = True
    Else
        CheckSite = False
    End If

    Set objHTTP = Nothing
End Function

Function HTTPPost(sUrl, sRequest)
  set oHTTP = CreateObject("Microsoft.XMLHTTP")
  oHTTP.open "POST", sUrl,false
  oHTTP.setRequestHeader "Content-Type", "application/x-www-form-urlencoded"
  oHTTP.setRequestHeader "Content-Length", Len(sRequest)
  oHTTP.send sRequest
  HTTPPost = oHTTP.responseText
 End Function

'MsgBox("description="&strDescription&"vasplit="&vasplit(0)&"workstation=" & strComputerName & "&configuration=" &strConfiguration & "&floor=" &strFloor)
