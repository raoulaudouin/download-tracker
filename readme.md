# Download Tracker

Small PHP script to track downloaded files on a server.

## How To

To track a file, create a directory on your server with the same name as the tracked file, including extension (`file.zip` in this git).

The file name of the file/folder must comply with URL encoding and include nothing more than digits (0-9), letters (A-Z, a-z), hyphens and underscores.

In the directory, copy the tracked file to be downloaded, along with the files `index.php` and `log.txt`.

You can now share the folder’s URL (`https://anydomain.net/file.zip`). The URL will open `index.php` wherein a script will:

1. Add the downloaded time and client IP to the `log.txt` file.
2. Force the download of the `file.zip` tracked file.