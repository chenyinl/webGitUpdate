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
        <form>
        <input 
                type="submit" 
                value = "Reflesh" 
                onclick = "window.location = wondow.location.href; return false;">
        </form>

        <form action="" method="POST">
            <input type="hidden" name="update" value="true"/>
          
            <input type="submit" value = "Update from Git" >
        </form>
        <div>
            <pre><?php if( $_POST[ "update" ] == "true"):?><?php
            echo shell_exec("git pull 2>&1");?><?php endif;?>
            </pre>
        </div>
<br/>
        <form action="" method="POST">
            <input type="hidden" name="deployStag" value="true"/>
            <input type="submit" value = "Deploy to SerenityNow" >
       </form>
            
        <div>
            <pre><?php if( $_POST[ "deployStag" ] == "true"):?><?php
            echo shell_exec("eb use serenitynow 2>&1;eb status 2>&1; eb deploy 2>&1");?><?php endif;?>
            </pre>
        </div>
<br/>        <form action="" method="POST">
            <input type="hidden" name="deployProd" value="true"/>
            <input type="submit" value = "Deploy to Production" >
       </form>
            
        <div>
            <pre><?php if( $_POST[ "deployProd" ] == "true"):?><?php
            echo shell_exec("eb use thunderbirdsenv 2>&1; eb status 2>&1; eb deploy 2>&1");?><?php endif;$
            </pre>
        </div>
        <h2>Remote Revision on Git Server</h2>
        <div>
            <pre><?php echo shell_exec("git ls-remote origin -h refs/heads/dev");?>
            </pre>
        </div>
        <h2>Local Revision</h2>
        <div>
            <pre><?php echo shell_exec("git show --summary");?>
            </pre>
        </div>
        <br/>
        <p>If the two revisions above are different, you can press "Update from Git" 
        button for a git pull.<br/>
            Note: The git is cloned by Apache, in Ubuntu, it will be www-data.
            Reference: http://jondavidjohn.com/git-pull-from-a-php-script-not-so-simple/
        </p>
        
    </body>
</html>
