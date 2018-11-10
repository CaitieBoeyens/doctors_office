<div class="columns cc-selector">
    <div class="column is-half">
    
        <p class="has-text-dark">Floor 1</p>
        <div class="box rooms-block ">
            <div class="tile is-ancestor">
                <div class="tile is-vertical is-8">
                    <div class="tile">
                        <div class="tile is-parent is-vertical">
                            <input  type="radio" name="room_id" value="1" id="room1"/>
                            
                            
                            
                            <?php 
                                $doc1 = $db -> getDocbyRoom(1);

                                if($doc1['last_name'] === null):
                            ?>
                                <article class="tile is-child notification room-cc is-blue-room">
                                    <label for="room1" >
                                    <strong class="has-text-dark">
                                        Room 1 
                                    </strong>
                                    <p class="has-text-dark "></p>
                                </label>
                                </article>
                                <?php else: ?>
                                <article class="tile is-child notification room-cc is-orange-room">
                                    <label for="room1" >
                                        <strong class="has-text-dark">
                                        Room 1 
                                        </strong>
                                            
                                        <p class="has-text-dark">
                                        Dr <?= $doc1['last_name'] ?>
                                        </p>
                                </label>
                                </article>
                                <?php endif; ?>
                            </label>
                            <input  type="radio" name="room_id" value="2" id="room2"/>
                            
                                <?php 
                                    $doc2 = $db -> getDocbyRoom(2);

                                    if($doc2['last_name'] === null):
                                ?>
                                    <article class="tile is-child notification room-cc  is-blue-room">
                                    <label for="room2" >
                                    <strong class="has-text-dark">
                                        Room 2 
                                    </strong>
                                    <p class="has-text-dark "></p>
                                </label>
                                </article>
                                <?php else: ?>
                                <article class="tile is-child notification room-cc  is-orange-room">
                                    <label for="room2" >
                                        <strong class="has-text-dark">
                                        Room 2 
                                        </strong>
                                            
                                        <p class="has-text-dark ">
                                        Dr <?= $doc2['last_name'] ?>
                                        </p>
                                </label>
                                </article>
                                <?php endif; ?>
                            </label>
                        </div>
                        <div class="tile is-parent">
                            <input  type="radio" name="room_id" value="3" id="room3"/>
                            
                                <?php 
                                    $doc3 = $db -> getDocbyRoom(3);

                                    if($doc3['last_name'] === null):
                                ?>
                                    <article class="tile is-child notification room-cc  is-blue-room">
                                        <label for="room3" >
                                        <strong class="has-text-dark">
                                            Room 3 
                                        </strong>
                                        <p class="has-text-dark "></p>
                                    </label>
                                    </article>
                                    <?php else: ?>
                                    <article class="tile is-child notification room-cc  is-orange-room">
                                        <label for="room3" >
                                            <strong class="has-text-dark">
                                            Room 3 
                                            </strong>
                                                
                                            <p class="has-text-dark ">
                                            Dr <?= $doc3['last_name'] ?>
                                            </p>
                                    </label>
                                    </article>
                                    <?php endif; ?>
                                </label>
                        </div>
                    </div>
                    <div class="tile is-parent">
                        <input  type="radio" name="room_id" value="4" id="room4"/>
                        
                            <?php 
                                $doc4 = $db -> getDocbyRoom(4);

                                if($doc4['last_name'] === null):
                            ?>
                                <article class="tile is-child notification room-cc  is-blue-room">
                                    <label for="room4" >
                                    <strong class="has-text-dark">
                                        Room 4 
                                    </strong>
                                    <p class="has-text-dark "></p>
                                </label>
                                </article>
                            <?php else: ?>
                                <article class="tile is-child notification room-cc  is-orange-room">
                                    <label for="room4" >
                                        <strong class="has-text-dark">
                                        Room 4 
                                        </strong>
                                            
                                        <p class="has-text-dark ">
                                        Dr <?= $doc4['last_name'] ?>
                                        </p>
                                </label>
                                </article>
                            <?php endif; ?>
                        </label>    
                    </div>
                </div>
                <div class="tile is-parent">
                    <input  type="radio" name="room_id" value="5" id="room5"/>
                    
                        <?php 
                            $doc5 = $db -> getDocbyRoom(5);

                            if($doc5['last_name'] === null):
                        ?>
                            <article class="tile is-child notification room-cc  is-blue-room">
                                <label for="room5" >
                                <strong class="has-text-dark">
                                    Room 5 
                                </strong>
                                <p class="has-text-dark "></p>
                            </label>
                            </article>
                        <?php else: ?>
                            <article class="tile is-child notification room-cc  is-orange-room">
                                <label for="room5" >
                                    <strong class="has-text-dark">
                                    Room 5 
                                    </strong>
                                        
                                    <p class="has-text-dark ">
                                    Dr <?= $doc5['last_name'] ?>
                                    </p>
                            </label>
                            </article>
                        <?php endif; ?>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="column is-half">
    
        <p class="has-text-dark">Floor 2</p>
        <div class="box rooms-block">
            <div class="tile is-ancestor">
                <div class="tile is-vertical is-8">
                    <div class="tile">
                        <div class="tile is-parent">
                            <input  type="radio" name="room_id" value="6" id="room6"/>
                            <?php 
                                $doc6 = $db -> getDocbyRoom(6);

                                if($doc6['last_name'] === null):
                            ?>
                                <article class="tile is-child notification room-cc  is-blue-room">
                                    <label for="room6" >
                                    <strong class="has-text-dark">
                                        Room 1 
                                    </strong>
                                    <p class="has-text-dark "></p>
                                </label>
                                </article>
                                <?php else: ?>
                                <article class="tile is-child notification room-cc  is-orange-room">
                                    <label for="room6" >
                                        <strong class="has-text-dark">
                                        Room 1 
                                        </strong>
                                            
                                        <p class="has-text-dark ">
                                        Dr <?= $doc6['last_name'] ?>
                                        </p>
                                </label>
                                </article>
                                <?php endif; ?>
                        </div>
                        <div class="tile is-parent">
                            <input  type="radio" name="room_id" value="7" id="room7"/>
                            <?php 
                                $doc7 = $db -> getDocbyRoom(7);

                                if($doc7['last_name'] === null):
                            ?>
                                <article class="tile is-child notification room-cc  is-blue-room">
                                    <label for="room7" >
                                    <strong class="has-text-dark">
                                        Room 2 
                                    </strong>
                                    <p class="has-text-dark "></p>
                                </label>
                                </article>
                                <?php else: ?>
                                <article class="tile is-child notification room-cc  is-orange-room">
                                    <label for="room7" >
                                        <strong class="has-text-dark">
                                        Room 2 
                                        </strong>
                                            
                                        <p class="has-text-dark ">
                                        Dr <?= $doc7['last_name'] ?>
                                        </p>
                                </label>
                                </article>
                                <?php endif; ?>
                        </div>
                    </div>
                    <div class="tile is-parent">
                        <input  type="radio" name="room_id" value="8" id="room8"/>
                        <?php 
                                $doc8 = $db -> getDocbyRoom(8);

                                if($doc8['last_name'] === null):
                            ?>
                                <article class="tile is-child notification room-cc  is-blue-room">
                                    <label for="room8" >
                                    <strong class="has-text-dark">
                                        Room 3 
                                    </strong>
                                    <p class="has-text-dark ">    </p>
                                </label>
                                </article>
                                <?php else: ?>
                                <article class="tile is-child notification room-cc  is-orange-room">
                                    <label for="room8" >
                                        <strong class="has-text-dark">
                                        Room 3 
                                        </strong>
                                            
                                        <p class="has-text-dark ">
                                        Dr <?= $doc8['last_name'] ?>
                                        </p>
                                </label>
                                </article>
                                <?php endif; ?>
                    </div>
                </div>
                <div class="tile is-parent">
                    <input  type="radio" name="room_id" value="9" id="room9"/>
                    <?php 
                                $doc9 = $db -> getDocbyRoom(9);

                                if($doc9['last_name'] === null):
                            ?>
                                <article class="tile is-child notification room-cc  is-blue-room">
                                    <label for="room9" >
                                    <strong class="has-text-dark">
                                        Room 4 
                                    </strong>
                                    <p class="has-text-dark "></p>
                                </label>
                                </article>
                                <?php else: ?>
                                <article class="tile is-child notification room-cc  is-orange-room">
                                    <label for="room9" >
                                        <strong class="has-text-dark">
                                        Room 4 
                                        </strong>
                                            
                                        <p class="has-text-dark ">
                                        Dr <?= $doc9['last_name'] ?>
                                        </p>
                                </label>
                                </article>
                                <?php endif; ?>
                </div>
            </div>
        </div>
        
    </div>