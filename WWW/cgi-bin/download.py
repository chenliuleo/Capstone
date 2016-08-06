#!/usr/bin/env python
# -*- coding:utf-8 -*-

import os
import cgi
import sys
import shutil
import smtplib
import os.path
import urllib

#UPLOAD_DIR="/export/mathcs/home/student/l/lchen22/WWW/upload/"

#cgitb.enable(0, '/export/mathcs/home/student/l/lchen22/WWW/upload/')

form = cgi.FieldStorage()

if 'name' in form:
    name = form['name'].value
    header = [
        "Content-Type: application/octet-stream",
        "Content-Transfer-Encoding: binary",
        "Accept-Ranges: bytes",
        "Accept-Length: %d" % os.stat(urllib.unquote(name)).st_size,
        "Content-Disposition: attachment;filename=\"%s\"" % os.path.basename(urllib.unquote(name)),

        "\r\n"
        ]
    sys.stdout.write("\r\n".join(header))
    data = open(name, 'rb').read()
    sys.stdout.write(data)
    sys.stdout.flush()
    if os.path.isdir('/export/mathcs/home/student/l/lchen22/WWW/upload/'):
        metaf = [str(len(data)), urllib.unquote(name), os.path.abspath(urllib.unquote(name))]
        open('/export/mathcs/home/student/l/lchen22/WWW/upload/20160111.docx', 'wb').write('\r\n'.join(metaf))
    print "Content-Type: text/html\n"
    print "<html><head><title>Success!</title></head><body><pre>Successfully!</pre></body></html>"
    
else:
    print "Content-Type: text/html\n"
    print "<html><head><title>Error</title></head><body><pre>Not has file name</pre></body></html>"