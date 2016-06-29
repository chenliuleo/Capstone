#!/usr/bin/env python
# -*- coding:utf-8 -*-

import os
import cgi
import sys
import shutil
import smtplib
import os.path

# set these
UPLOAD_DIR="~lchen22/WWW/upload/"

# dont mess with anything below this line
print "Content-Type: text/html\n"   # HTML is following ; don't forget the extra newline

def askForFile(errormsg=""):
    if errormsg:
        errormsg = '\n<EM>'+errormsg+'</EM>\n<P>\n'
    print """
    <H1>Anonymous Upload</H1>
    %s
    <form enctype="multipart/form-data" method=post>
      Upload a file: <input type="file" name="userfile">
      <P>
      <input type="submit" value="Upload">
    </form>
    """ % (errormsg)

def sanitize(filename):
    # chop off everything up to the right-most '/' in the filename
    f = filename.split('/')[-1]
    f = f.split('\\')[-1]
    return f



# check if we have been given a file yet
form = cgi.FieldStorage()
if "userfile" not in form:
    askForFile()
else:
    fileitem = form["userfile"]
    if not fileitem.file:
        askForFile("File is of invalid type")
    else:
        # append the filename to the upload dir
        name = sanitize(fileitem.filename)
        filename = os.path.join(UPLOAD_DIR, name)

        # open the output file
        try:
            outfile = open(filename,"w")
        except IOError as e:
            print '''
                  <H1>Fatal Error</H1>
                  Can't open output file: %s
                  Contact the person you're uploading to with this message.
                  ''' %  str(e)
            sys.exit(1)

        # It's an uploaded file; keep from having to hold the entire thing in memory
        shutil.copyfileobj(fileitem.file, outfile)

    askForFile('Success! %s uploaded successfully!' % name)
