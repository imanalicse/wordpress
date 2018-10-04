<?php 
namespace Module\Vimeo_Uploader;

class Template {
    /**
     * Init
     */
    public function __construct() {}

    /**
     * Template render
     */
    public function tab_template() {
        ?>
        <div class="watp-wrapper">
            <div class="watp-header">
                <h2><span class="dashicons dashicons-welcome-learn-more"></span> Course</h2>
            </div>
            <div class="watp-body">
                <div class="watp-row">
                    <div class="watp-settings-tabs">
                        <ul class="watp-tabs">
                            <li><a href="#album" class="active" style="display: none"><span class="dashicons dashicons-video-alt"></span> <span>Create album</span></a></li>
                            <li><a href="#upload" class="active"><span class="dashicons dashicons-upload"></span> <span>Upload Video</span></a></li>
                            <li><a href="#uploaded-videos"><span class="dashicons dashicons-video-alt2"></span> <span>Video List</span></a></li>
                        </ul>
                        <!-- Create album -->
                        <div id="album" class="watp-settings-tab active" style="display: none;">
                            <div class="watp-row-2">
                                <div class="watp-col">
                                    <!-- Album Create Form -->
                                    <div class="watp-card" id="watp-album-create-form-appender">
                                        <script type="text/html" id="tmpl-watp-album-form-template">
                                            <h4 class="card-title"><span class="dashicons dashicons-video-alt"></span> {{data.title}}</h4>
                                            <form id="watp-create-album">
                                                <label for="album Name"><strong>Album Name : </strong></label>
                                                <input type="text" name="watp_album_name" class="regular-text" placeholder="e.g: WordPress">

                                                <label for="Description"><strong>Description : </strong></label>
                                                <textarea name="watp_album_description" rows="7" class="regular-text"></textarea>

                                                <label for="album Privacy"><strong>Privacy :</strong></label>
                                                <select name="watp_album_privacy" id="watp-album-privacy">
                                                    <option value="anybody">Anybody</option>
                                                    <option value="embed_only">Embed Only</option>
                                                    <option value="password">Password Protected</option>
                                                </select>

                                                <input type="submit" value="Create Album" class="button button-primary button-watp" id="vimeo-create-album">
                                            </form>
                                        </script>
                                    </div>
                                    <!-- Album Edit Album -->
                                    <div class="watp-card" id="watp-album-edit-form-appender">
                                        <script type="text/html" id="tmpl-watp-album-edit-template">
                                            <h4 class="card-title">{{data.title}}</h4>
                                            <form id="watp-edit-album">
                                                <label for="album Name"><strong>Album Name : </strong></label>
                                                <input type="text" name="watp_edited_album_name" class="regular-text" value="{{{data.data.name}}}">

                                                <label for="Description"><strong>Description : </strong></label>
                                                <textarea name="watp_edited_album_description" rows="7" class="regular-text">{{{data.data.description}}}</textarea>

                                                <label for="album Privacy"><strong>Privacy :</strong></label>
                                                <select name="watp_edited_album_privacy">
                                                    <option value="anybody">Anybody</option>
                                                    <option value="embed_only">Embed Only</option>
                                                    <option value="password">Password Protected</option>
                                                </select>   

                                                <!-- Hidden Field for Album ID -->
                                                <input type="hidden" name="watp_album_hidden_id" value="{{{data.album_id}}}">

                                                <input type="submit" value="Edit Album" class="button button-primary button-watp" id="vimeo-edit-album"> &nbsp;
                                                <button class="button button-secondary button-watp" id="alter-to-create-album-form">Cancel</button>
                                            </form>
                                        </script>
                                    </div>
                                </div>
                                <div class="watp-col">
                                    <div class="watp-card">
                                        <h4 class="card-title"><span class="dashicons dashicons-video-alt2"></span> Album List</h4>
                                        <p class="loader-status"></p>
                                        <form id="watp-album-list-form">
                                            <script type="text/html" id="tmpl-watp-album-list" >
                                                <table class="watp-settings-table">
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>URL</th>
                                                        <th>Privacy</th>
                                                        <th style="width: 150px">Action</th>
                                                    </tr>
                                                    <# _.each( data, function( item ) { #>
                                                        <tr>
                                                            <td>{{{item.name}}}</td>
                                                            <td><a href="{{{item.link}}}" target="_blank">{{{item.link}}}</a></td>
                                                            <td>{{{item.privacy.view}}}</td>
                                                            <td>
                                                                <button class="button button-primary watp-album-edit" id="watp-album-edit" data-link="{{{item.link}}}">Edit</button> &nbsp;
                                                                <button class="button button-secondary watp-album-delete" id="watp-album-delete" data-link="{{{item.link}}}">Delete</button>
                                                            </td>
                                                        </tr>
                                                    <# }); #>
                                                </table>
                                            </script>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Upload Video -->
                        <div id="upload" class="watp-settings-tab active">
                            <div class="watp-row-2">
                                <!-- Video Upload Form -->
                                <div class="watp-col">
                                    <div class="watp-card">
                                        <h4 class="card-title"><span class="dashicons dashicons-upload"></span> Upload a video</h4>
                                        <form enctype="multipart/form-data" id="upload-video-to-album-form">
                                            <label for="Title"><strong>Video Title :</strong></label>
                                            <input type="text" name="watp_video_title" class="regular-text" id="watp-video-title">

                                            <label for="Description"><strong>Description :</strong></label>
                                            <textarea name="watp_video_description" rows="7" id="watp-video-description"></textarea>

                                            <label for="Privacy"><strong>Privacy :</strong></label>
                                            <select name="watp_video_privacy" id="watp-video-privacy">
                                                <option value="anybody">Anyone can watch</option>
                                                <option value="contacts">Contacts</option>
                                                <option value="disable">Disable</option>
                                                <option value="nobody">No Body</option>
                                                <option value="password">Password</option>
                                                <option value="unlisted">Unlisted</option>
                                                <option value="Users">Users</option>
                                            </select>

                                            <div class="file-area">
                                                <label for="images"><strong>Upload Video :</strong></label>
                                                <input type="file" name="watp_video_file" class="vimeo-video-file" id="watp-video-file" required="required"/>
                                                <div class="file-dummy">
                                                    <div class="file-name">Select a video file</div>
                                                </div>
                                            </div>

                                            <div class="watp-row-2">
                                                <div class="watp-col">
                                                    <input type="submit" value="Upload Video" class="button button-primary button-watp" id="vimeo-upload">
                                                </div>
                                                <div class="watp-col">
                                                    <p class="upload-status"></p>
                                                </div>
                                                <div class="watp-col">
                                                    <p class="vimeo-url"></p>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="watp-col"></div>
                            </div>
                        </div>

                        <!-- Uploaded Video List -->
                        <div id="uploaded-videos" class="watp-settings-tab">
                            <div class="watp-card" id="watp-uploaded-video-appender">
                                <p class="loader-status"></p>
                                <script type="text/html" id="tmpl-watp-uploaded-video-list">
                                    <table class="watp-settings-table">
                                        <tr>
                                            <th>Title</th>
                                            <th>Embeded</th>
                                            <th>Privacy</th>
                                            <th>Date</th>
                                            <th>States</th>
                                            <th style="width: 150px;">Action</th>
                                        </tr>
                                        <# _.each( data, function( item ) { #>
                                            <tr>
                                                <td><p>{{{item.name}}}<p><a href="{{{item.link}}}" target="_blank">{{{item.link}}}</a></td>
                                                <td><textarea class="regular-text" rows="5">{{{item.embed.html}}}</textarea></td>
                                                <td>{{{item.privacy.view}}}</td>
                                                <td>{{{item.modified_time}}}</td>
                                                <td>
                                                    <p>Plays : {{{item.stats.plays}}} times</p>
                                                    <p>Rating : {{{item.content_rating}}}</p>
                                                </td>
                                                <td>
                                                    <button class="button button-primary watp-album-edit" id="watp-video-list-edit" data-link="{{{item.link}}}">Edit</button> &nbsp;
                                                    <button class="button button-secondary watp-album-delete" id="watp-video-list-delete" data-link="{{{item.link}}}">Delete</button>
                                                </td>
                                            </tr>
                                        <# }); #>
                                    </table>
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="watp-footer"></div>
        </div>
        <?php
    }
}