
<div class="container">
        <p class="text-center h1 py-4">User Info</p>
        {if $smarty.session.user.status == '255'}
            <div id="error" class="alert alert-danger text-center w-100">Please change default password</div>
        {/if}
        <form class="userInfo" id="userInfo">
            <div class="input-group my-4">
                {if $smarty.session.user.role == "C"}
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" name="xFirstName" placeholder="First Name" {if
                        isset($STUDENT)}value="{$STUDENT[0]['name']}" {/if}> </div> <div class="input-group my-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" name="xLastName" placeholder="Last Name" {if
                        isset($STUDENT)}value="{$STUDENT[0]['last_name']}" {/if}> </div> <div class="input-group my-4">
                {/if}
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                </div>
                <input type="text" class="form-control" name="xEmail" placeholder="Email" 
                {if $smarty.session.user.role == "C"}
                    {if isset($STUDENT)}
                        value="{$STUDENT[0]['email']}" 
                    {/if} 
                {else}
                    {if isset($USER)}
                        value="{$USER[0]['email']}" 
                    {/if} 
                {/if}>
                </div> 
                <div class="input-group my-4">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-lock px-1"></i></span>
                </div>
                <input type="password" class="form-control" name="xNewPassword" placeholder="New password"
                    aria-label="Username">
            </div>
            <div class="input-group my-4">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-lock px-1"></i></span>
                </div>
                <input type="password" class="form-control" name="xConfPassword" placeholder="Confirm password"
                    aria-label="Username">
            </div>

            <div class="form-row">
                <div class="form-group text-center col-12 px-4 py-1">
                    <button type="button" class="btn btn-primary w-50 submit" name="submit"
                        id='sendUserInfo'>Update</button>
                    
                    <div id="error"</div>
                </div>
            </div>
    
    </form>
   
</div>
