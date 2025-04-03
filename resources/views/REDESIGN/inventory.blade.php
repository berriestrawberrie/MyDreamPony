@extends('REDESIGN/redesign')
@section('title')My's Inventory @endsection


@section('bodysection')

 
<div class="inventory">
    <div class="inventory__links">
        <div class="inventorypoint">
            <img class="inventorylink" src="{{asset('storage/images/pot.png')}}">
            <h5>Cooking</h5>
        </div>
        <div class="inventorypoint">
            <img class="inventorylink" src="{{asset('storage/images/leaf.png')}}">
            <h5>Farming</h5>
        </div>
        <div class="inventorypoint">
            <img class="inventorylink" src="{{asset('storage/images/mirror.png')}}">
            <h5>Wardrobe</h5>
        </div>
        <div class="inventorypoint">
            <img class="inventorylink" src="{{asset('storage/images/horseshoe.png')}}">
            <h5>Ponyware</h5>
        </div>
        <div class="inventorypoint">
            <img class="inventorylink" src="{{asset('storage/images/crafting1.png')}}">
            <h5>Crafting</h5>
        </div>
        <div class="inventorypoint">
            <img class="inventorylink" src="{{asset('storage/images/consumable.png')}}">
            <h5>Consumable</h5>
        </div>
        <img class="inventoryshine" src="{{asset('storage/images/shine.svg')}}">
    </div>
    <div class="inventory__main">

        <div class="sortdetail">
            <div class="sortdetail__detail">
                <div class="groupimg">
                    <div class="detailtext">
                        <h4>Item Name:</h4>
                        <p>Item description describing many things about the item</p>
                        <hr>
                        <span>Tag1</span><span>Tag1</span><span>Tag1</span>
                    </div>
                    <div class="detailimg">
                        <img src="{{asset('storage/images/bowicon.png')}}">
                    </div>
                </div>
                <div class="moredetail">I have more useful information</div>
                <button class="btn-usage">Usage?</button>
            </div>
            <div class="sortdetail__sort">
                <form>
                    <fieldset>
                        <label for="filter">Filter: </label>
                    <select id="filter" name="filter">
                        <option selected>None</option>
                        <option>Rarity</option>
                        <option>Quantity</option>
                        <option>Alphabetical</option>
                    </select>
                    </fieldset>
                   <fieldset>
                    <label for="sort">Sort: </label>
                    <select id="sort" name="sort">
                        <option selected>None</option>
                        <option>Rarity</option>
                        <option>Quantity</option>
                        <option>Alphabetical</option>
                    </select>
                   </fieldset>
                </form>
            </div>
        </div>
        <div class="inventoryitems">
                <div class="item">
                    <div class="actual"><img src="{{asset('storage/images/bowicon.png')}}"></div>
                    <div class="cover"></div>
                    <div class="desc">
                        <p><b>Item Name</b></p>
                        <p>Desc: I am an item description hear me rawr
                            something else??</p>
                        <p>Slots: Tail</p>
                        <div class="tags">
                            <span>tag 1</span><span>tag 2</span>
                            <span>tag 3</span>
                        </div>
                    </div>
                </div>
              
         
        </div><!--END OF INVENTORY ITEMS-->
        
    </div><!--END OF INVENTORY ITEMMAIN-->
</div><!--END OF INVENTORY -->

@endsection