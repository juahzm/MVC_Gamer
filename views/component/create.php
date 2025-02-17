{{ include('layouts/header.php', {title:'Component Create'})}}
    <div class="Info flex-row">
        <form action="component_store.php" method="post">
            <div class="h1">
                <h1>Add Component</h1>
            </div>
            
            <label>Component Name
                <input type="text" name="componentName">
            </label>
            <label>Component Description
                <input type="text" name="componentDescription">
            </label>
            <label>Component Guarantee 
                <input type="date" name="componentGuarantee">
            </label>
            <label>Component Price
                <input type="number" name="componentPrice">
            </label>
            <label for = "Manufacturer_idManufacturer">Manufacturer

                <select name="Manufacturer_idManufacturer" id="Manufacturer_idManufacturer" >;
                <!-- <?php
  
                require_once('Classes/CRUD.php');
                $crud = new CRUD;
                $select = $crud->select('Manufacturer');

                ?> -->
               

                <?php
                    foreach($select as $row) {
                ?>
                    <option value="<?= $row['manufacturerId']; ?>"><?= $row['manufacturerName']; ?></option>
                <?php
                    }
                ?>
                
        </form>

        <input type="submit" value="Save"class="bouton">
        
    </div>
    {{ include('layouts/footer.php')}}