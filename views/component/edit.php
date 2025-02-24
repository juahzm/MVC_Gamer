{{ include('layouts/header.php', {title: 'Component edit'}) }}

<div class="Info flex-row">
    <form action="{{ base }}/component/store" method="post">
        <div class="h1">
            <h1>Add Component</h1>
        </div>

        <label>Component Name
            <input type="text" name="componentName" value="{{ component.componentName }}">
        </label>

        <label>Component Description
            <input type="text" name="componentDescription" value="{{ component.componentDescription }}">
        </label>

        <label>Component Guarantee 
            <input type="date" name="componentGuarantee" value="{{ component.componentGuarantee }}">
        </label>

        <label>Component Price
            <input type="number" name="componentPrice" value="{{ component.componentPrice }}">
        </label>

        <label for="Manufacturer_idManufacturer">Manufacturer
            <select name="Manufacturer_idManufacturer" value="{{Manufacturer_idManufacturer}}">
               
               
            </select>
        </label>

        <input type="submit" value="Save" class="bouton">
    </form>
</div>

{{ include('layouts/footer.php') }}
