<html>
    <head>
        <title>Git Update</title>
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
        <h1>Git Info</h1>
        <form action="" method="POST">
            <input type="hidden" name="update" value="true"/>
            <input type="submit" value = "Update" >
            <input 
                type="submit" 
                value = "Reflesh" 
                onclick = "location.reload(); return false;">
        </form>
            
        <div>
            <pre><?php if( $_POST[ "update" ] == "true"):?><?php
            echo shell_exec("git pull 2>&1");?><?php endif;?>
            </pre>
        </div>
        <h2>Remote Revision on Git Server</h2>
        <div>
            <pre><?php echo shell_exec("git ls-remote origin -h refs/heads/master");?>
            </pre>
        </div>
        <h2>Local Revision</h2>
        <div>
            <pre><?php echo shell_exec("git show --summary");?>
            </pre>
        </div>
        <br/>
        <p>If the two revisions above are different, you can press "Update" 
        button for a git pull.<br/>
            Note: The git is cloned by Apache, in Ubuntu, it will be www-data.
            Reference: http://jondavidjohn.com/git-pull-from-a-php-script-not-so-simple/
        </p>
        
    </body>
</html>
