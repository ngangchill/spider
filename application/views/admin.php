<html>
<head>
<title>Spider</title>
<base href="<?php echo base_url(); ?>">
<link href="statics/admin.css" rel="stylesheet" type="text/css"/>
<script src="statics/jquery-1.9.1.js"></script>
</head>
<body>
<div class="admin">
    <div class="tabs">
        <ul>
            <li id="sites_btn"><a href="#">Sites</a></li>
            <li id="category_btn"><a href="#">Categories</a></li>
            <li id="index_btn"><a href="#">Index</a></li></li>
            <li id="cleantable_btn"><a href="#">Clean Table</a></li>
            <li id="status_btn"><a href="#">Status</a></li></li>
            <li id="setting_btn"><a href="#">Settings</a></li>
            <li id="database_btn"><a href="#">Database</a></li>
            <li id="logout_btn"><a href="#">Logout</a></li>
        </ul>
    </div>
    <div class="main">
        <div class="submenu">
            <!-- site 标签 -->
            <div id="sites">
                <ul>
                    <li id="addsite_btn"><a href="#">Add Site</a></li>
                    <li><a href="#">Reindex all</a></li>
                </ul>
            </div>
            <!-- category 标签 -->
            <div id="category">
                <ul>
                    <li>
                        <a href='#'>Advanced options</a>
                    </li>
                </ul>
                <table>
                    <form action="spider.php" method="post">
                        <tr>
                            <td><b>Address:</b></td>
                            <td>
                                <input type="text" name="url" size="48">
                            </td>
                        </tr>
                        <tr>
                            <td><b>Indexing options:</b></td>
                            <td>
                                <input type="radio" name="soption" value="full">Full<br/>
                                <input type="radio" name="soption" value="level">To depth: 
                                <input type="text" name="maxlevel" size="2" value=""><br/>
                                <input type="checkbox" name="reindex" value="1">Reindex<br/>
                            </td>
                        </tr>
                    </form>
                </table>
            </div>
            <!-- index 标签 -->
            <div id="index">
                <form method="post">
                    <tr>
                        <td><b>Address:</b></td>
                        <td><input type="text" name="url" size="48"></td>
                    </tr>
                    <tr>
                        <td><b>Indexing options:</b></td>
                        <td>
                            <input type="radio" name="soption" value="full">Full<br/>
                            <input type="radio" name="soption" value="level">To depth: 
                            <input type="text" name="maxlevel" size="2"><br/>
                            <input type="checkbox" name="reindex" value="1">Reindex<br/>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="checkbox" name="domaincb" value="1">Spider can leave domain<br/></td>
                    </tr>
                    <tr><td><b>URL must include:</b></td><td><textarea name=in cols=35 rows=2 wrap="virtual"></textarea></td></tr>
                    <tr><td><b>URL must not include:</b></td><td><textarea name=out cols=35 rows=2 wrap="virtual"></textarea></td></tr>
                    <tr><td></td><td><input type="submit" id="submit" value="Start indexing"></td></tr>
                </form>
            </div>

            <!-- cleantable 标签 -->
            <div id="cleantable">
                <table cellspacing ="0" cellpadding="0" class="darkgrey">
                    <tr>
                        <td align="left">
                            <table cellpadding="3" cellspacing = "1"  width="100%">
                                <tr class="grey"  >
                                    <td align="left"><a href="admin.php?f=15" id="small_button">Clean keywords</a></td>
                                    <td align="left">Delete all keywords not associated with any link.</td>
                                </tr>
                                <tr class="grey"  >
                                    <td align="left"><a href="admin.php?f=16" id="small_button">Clean links</a></td>
                                    <td align="left">Delete all links not associated with any site.</td></tr>
                                <tr class="grey"  >
                                    <td align="left"><a href="admin.php?f=17" id="small_button">Clear temp tables </a></td>
                                    <td align="left">items in temporary table.</td>
                                </tr>
                                <tr class="grey"  >
                                    <td align="left"><a href="admin.php?f=23" id="small_button">Clear search log </a></td>
                                    <td align="left">items in search log.</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>

            <!-- status 标签 -->
            <div id="status">
                <div id='submenu'>
                    <ul>
                        <li><a href="#">Top keywords</a></li>
                        <li><a href="#">Largest pages</a></li>
                        <li><a href="#">Most popular searches</a></li>
                        <li><a href="#">Search log</a></li>
                        <li><a href="#">Spidering logs</a></li>
                    </ul>
                </div>
            </div>

            <!-- setting 标签 -->
            <div id="setting">
                Setting part
            </div>

            <!-- database 标签 -->
            <div id="database">
                Database part
            </div>

            <!-- logout 标签 -->
            <div id="logout">
                Logout part
            </div>
            <!-- 添加 站点 -->
            <div id="addsite">
                <center><b>Add a site</b></center>
                <br/>
                <center>
                    <table>
                        <form action=admin.php method=post>
                            <tr>
                                <td>URL:</td>
                                <td align ="right"></td>
                                <td><input type=text name=url size=60 value =""></td>
                            </tr>
                            <tr>
                                <td>Title:</td>
                                <td></td>   
                                <td><input type=text name=title size=60></td>
                            </tr>
                            <tr>
                                <td>Short description:</td>
                                <td></td><td><textarea name=short_desc cols=45 rows=3 wrap="virtual"></textarea></td>
                            </tr>
                            <tr>
                                <td>Category:</td>
                                <td></td>
                                <td>
                                    <tr>
                                        <td></td>   
                                        <td></td>       
                                        <td><input type=submit id="submit" value=Add></td>
                                    </tr>
                                </td>
                        </form>
                    </table>
                </center>
            </div>
        </div>
    </div>
</div>

    

<script type="text/javascript">
$('#sites_btn').click(function(){
    // $('div#category').hide();
    $('div.submenu div:not(#sites)').hide();
    $('div#sites').show();
    return false;
});

$('#category_btn').click(function(){
    $('div.submenu div:not(#category)').hide();
    $('div#category').show();
    return false;
});

$('#index_btn').click(function(){
    $('div.submenu div:not(#index)').hide();
    $('div#index').show();
    return false;
});

$('#cleantable_btn').click(function(){
    $('div.submenu div:not(#cleantable)').hide();
    $('div#cleantable').show();
    return false;
});

$('#status_btn').click(function(){
    $('div.submenu div:not(#status)').hide();
    $('div#status').show();
    return false;
});

$('#setting_btn').click(function(){
    $('div.submenu div:not(#setting)').hide();
    $('div#setting').show();
    return false;
});

$('#database_btn').click(function(){
    $('div.submenu div:not(#database)').hide();
    $('div#database').show();
    return false;
});

$('#logout_btn').click(function(){
    $('div.submenu div:not(#logout)').hide();
    $('div#logout').show();
    return false;
});

$('#addsite_btn').click(function(){
    $('div.submenu div:not(#addsite)').hide();
    $('div#addsite').show();
    return false;
});
</script>
</body>
