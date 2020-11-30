<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Exo+2&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/core.css">
    <link rel="stylesheet" href="../css/fa-icons.css" type="text/css">
    <script src="../js/jquery-3.4.1.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/core.js"></script>
	<script src="../js/createStudent.js"></script>
    
</head>
<body>
{include file='navigation.tpl'}
{if $smarty.session.user.status == '255'}
    {include file='personal-data.tpl'}
{else}
    {if $smarty.session.user.role == 'A'}
        {if isset($smarty.get.nav)}   
            {if $smarty.get.nav == 'createStudent'} {include file='templates/admin/createStudent.tpl'} 
            {elseif $smarty.get.nav == 'personal-data'} {include file='personal-data.tpl'}
            {else}
            {/if}
        {else}
            {include file='templates/admin/studentsReview.tpl'}
        {/if}			
    {/if}
            


    {if $smarty.session.user.role == 'C'}
        {if isset($smarty.get.nav)}    
            {if $smarty.get.nav == 'personal-data'} {include file='personal-data.tpl'}
            {/if}
        {else}
            {include file='templates/clients/client-home.tpl'}
            
        {/if}			
        
    {/if}

{/if}
</body>
</html>
