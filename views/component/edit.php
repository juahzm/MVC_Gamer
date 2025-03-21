{{ include('layouts/header.php', {title: 'Component edit'}) }}

<div class="Info flex-row">
    <form method="post">
        <div class="h1">
            <h1>Add Component</h1>
        </div>

        <label>Component Name
            <input type="text" name="componentName" value="{{ component.componentName }}">
        </label>
        {% if errors.componentName is defined %}
            <span class="error">{{errors.componentName}}</span>
            {%endif%}

        <label>Component Description
            <input type="text" name="componentDescription" value="{{ component.componentDescription }}">
        </label>
        {% if errors.componentDescription is defined %}
            <span class="error">{{errors.componentDescription}}</span>
            {%endif%}

        <label>Component Guarantee 
            <input type="date" name="componentGuarantee" value="{{ component.componentGuarantee }}">
        </label>

            <label>Component Price
                <input type="number" name="componentPrice" value="{{ component.componentPrice }}">
            </label>
            {% if errors.componentPrice is defined %}
            <span class="error">{{errors.componentPrice}}</span>
            {%endif%}

            <label>Manufacturer
                <select name="Manufacturer_idManufacturer">
                {% for manufacturer in manufacturers %}
                <option value="{{ manufacturer.manufacturerId}}">{{  manufacturer.manufacturerName}}</option>
                {% endfor %}
                </select>
            </label>


        <input type="submit" value="Save" class="bouton">
    </form>
</div>

{{ include('layouts/footer.php') }}
