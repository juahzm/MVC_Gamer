{{ include('layouts/header.php', {title:'Log in'})}}
    <div class="Info flex-row">
        <form method="post">
            <div class="h1">
                <h1>Login</h1>
            </div>
            
            
            <label>Client Username
                <input type="text" name="clientUsername" value="{{client.clientUsername}}">
            </label>
            {% if errors.clientUsername is defined %}
            <span class="error">{{errors.clientUsername}}</span>
            {%endif%}
            <label>Client Password
                <input type="text" name="clientPassword">
            </label>
            {% if errors.clientPassword is defined %}
            <span class="error">{{errors.clientPassword}}</span>
            {%endif%}
            

            <input type="submit" value="Login"class="bouton">

        </form>

 
        
    </div>
    {{ include('layouts/footer.php')}}