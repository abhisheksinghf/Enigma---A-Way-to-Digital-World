Set fso = createobject("Scripting.FileSystemObject") 
DesktopPath = CreateObject("WScript.Shell").SpecialFolders("Desktop") 
'Files count 
msgbox "The number of files on the desktop is : "&fso.GetFolder(DesktopPath).Files.Count 
'Folders count msgbox "The number of folders on the desktop is : "&fso.GetFolder(DesktopPath).SubFolders.Count 