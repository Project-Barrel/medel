<?php 

function mapFilter(){
    
    ?>
    <div class="map-header">
    <div class="left-half  line-right">
       
       <h3>Kavelgrootte</h3>
       <p>Selecteer de door u gewenste kavelgrootte:</p>
       
        <div class="filter">
            <div>
                <input id="radio1" type="radio" name="radio" value="1" checked="checked"><label for="radio1"><span><span></span></span> Alle kavelgroottes</label>
            </div>
            <div>
                <input id="radio2" type="radio" name="radio" value="2"><label for="radio2"><span><span></span></span> < 3 ha</label>
            </div>
            <div>
                <input id="radio3" type="radio" name="radio" value="3"><label for="radio3"><span><span></span></span> > 3 ha</label>
            </div> 
    </div>
    </div><!-- left half -->
    
    <div class="right-half">  
    <div id="legenda"> 
    <span class="orange">Uit te geven</span>
    <span class="blue">Uitgegeven / in optie</span>
    </div> 
    
    </div> <!-- right half -->                    
    </div><!-- map-header -->
    
<?php } ?>