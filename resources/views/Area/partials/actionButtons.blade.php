<div class="box-footer text-center" style="display: block;">
    <div class="input-group">
                                                        <span class="input-group-btn">
                                                            <button type="button" @click="MakePost(item.id)"
                                                                    class="btn btn-success">
                                                                Post
                                                            </button>
                                                            <button type="button" class="btn btn-dark"
                                                                    @click="requestModel(item.id)">
                                                                Request
                                                            </button>
                                                            <button type="button" @click="GM(item.id)"
                                                                    class="btn btn-danger">
                                                                G.M
                                                            </button>
                                                            <br>
                                                            <button type="button"
                                                                    @click="ChangeParameter(item.posts[item.posts.length- 1].bn_id,item.id)"
                                                                    class="btn btn-info">
                                                                Parameters
                                                            </button>
                                                        </span>
    </div>
</div>
