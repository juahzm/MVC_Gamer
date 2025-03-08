{{ include('layouts/header.php', {title:'Client Create'})}}
    <div class="Info flex-row">
        <form method="post">
            <div class="h1">
                <h1>Create New Client</h1>
            </div>
            
            <label>Client Name
                <input type="text" name="clientName" value="{{client.clientName}}" >
            </label>
            {% if errors.clientName is defined %}
            <span class="error">{{errors.clientName}}</span>
            {%endif%}
            <label>Client Address
                <input type="text" name="clientAddress" value="{{client.clientAddress}}" >
            </label>
            {% if errors.clientAddress is defined %}
            <span class="error">{{errors.clientAddress}}</span>
            {%endif%}
            <label>Client Telephone
                <input type="text" name="clientTelephone" value="{{client.clientTelephone}}">
            </label>
            {% if errors.clientTelephone is defined %}
            <span class="error">{{errors.clientTelephone}}</span>
            {%endif%}
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
            <label>Client E-mail
                <input type="email" name="clientEmail" value="{{client.clientUsername}}">
            </label>
            {% if errors.clientEmail is defined %}
            <span class="error">{{errors.clientEmail}}</span>
            {%endif%}

            <label>Privilege
                <select name="Privilege_PrivilegeId">
                {% for privilege in privileges %}
                <!-- <option value="{{privilege.PrivilegeId}}"{%if privilege.PrivilegeId == client.Privilege_PrivilegeId %} selected {% endif %}>{{  privilege.privilegeName}}</option> -->
                <option value="{{privilege.privilegeId}}">{{  privilege.privilegeName}}</option>
                {% endfor %}
                </select>
            </label>

            <input type="submit" value="Save"class="bouton">

        </form>

 
        
    </div>
    {{ include('layouts/footer.php')}}