# wikiMenus
wikiMenus
Hello

Collaborators:
alding2 (Lin/Angela), aprilxu2 (April), dnoora2 (Danish), kghull2 (Khurram)

Github notes:

- To commit a change to your own branch: 
	1. git add .
	2. git commit -m "[message]"
	3. git push
	4. go to your own branch on the github website, click the green button to make a pull request so that others may review/approve/deny your changes.
- Every time before you start working, you need to commit or "stash" (throw away) your changes, then sync your branch with the origin branch in order to get the most up-to-date changes that everyone else made. To do this, type "git pull upstream master"

If you happen to get this kind of error when opening localhost/wikimenus/ with xampp:

Warning: mysqli::mysqli(): (HY000/1045): Access denied for user 'user'@'localhost' (using password: NO) in C:\xampp\htdocs\xo\php\connect.php on line 4

for this line: $db = new mysqli('127.0.0.1', 'root', '', 'wikimenus');
add a parameter at the end with the mysql port number