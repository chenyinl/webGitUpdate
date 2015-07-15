<html>
    <head>
        <title>staging.thunderbirds.com Update</title>
        <style>
            div {
                background-color:Azure;
                width: 800px;
                border-style: solid;
                border-width: 1px;
                border-color: Black;
                padding: 5px;
                
            }
        </style>
    </head>
    <body>
        <h1>staging.thunderbirds.com update</h1>
        <form>
        <input 
                type="submit" 
                value = "Reflesh" 
                onclick = "window.location = wondow.location.href; return false;">
        </form>

        <form action="" method="POST">
            <input type="hidden" name="update" value="true"/>
          
            <input type="submit" value = "Merge branch TX-dev to TX-staging and Deploy" >
        </form>
        <div>
            <pre><?php if( $_POST[ "update" ] == "true"):?><?php
            echo shell_exec("
                git pull;
		git checkout TX-dev;
 		git pull;
		git checkout TX-staging;
		git merge TX-dev;
		git push 2>&1");?><?php endif;?>
            </pre>
        </div>
        <p>If you see error in the merge please contact Chen.</p>
        <h2>Remote Revision on Git Server</h2>
        <div>
            <pre><?php echo shell_exec("git ls-remote origin -h refs/heads/TX-staging");?>
            </pre>
        </div>
        <h2>Current Git Information</h2>
        <div>
            <pre><?php echo shell_exec("git show --summary");?>
            </pre>
        </div>
        <br/>
        
        <!--<p>If the two revisions above are different, you can press "Update from Git" 
        button for a git pull.<br/>
            Note: The git is cloned by Apache, in Ubuntu, it will be www-data.
            Reference: http://jondavidjohn.com/git-pull-from-a-php-script-not-so-simple/
        </p>-->
        
    </body>
</html>
