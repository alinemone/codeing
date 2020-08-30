<template>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="comments">
                        <div class="comment-box add-comment" v-if="authcheck">
                            <span class="commenter-name">
                                <textarea row="3" placeholder="دیدگاه خود را بنویسید..." name="Add Comment" v-model="comment"/>
                                <div class="w-100 text-right">
                                    <small class="text-danger" v-for="err in errors.comment">{{err}}</small>
                                </div>
                                <button type="submit" class="btn btn-sm btn-ok mt-2" @click="postComment()">ارسال</button>
                             </span>
                        </div>
                        <div class="comment-box add-comment text-center" v-if="!authcheck">
                            <span class="commenter-name ">
                              برای ارسال نظر ابتدا وارد شوید
                               <a href="/login" target="_blank" class="btn btn-sm btn-ok">ورود</a>
                             </span>
                        </div>


                        <div v-for="comment in all.data" class="comment-box" v-if="comment.parent_id === 0">
                          <div class="d-inline-flex align-items-center w-100">
                              <img  :src="comment.user.profile_image" class="commenter-pic img-fluid">
                              <span class="pr-2">
                                  {{comment.user.name}}
                              </span>
                          </div>
                            <p class="comment-txt more">
                                {{comment.comment}}
                            </p>
                            <div class="comment-meta">
                                <button @click.prevent="comment_reply(comment.id)" class="btn btn-sm btn-outline-secondary"><i class="fa fa-reply-all" aria-hidden="true"></i> پاسخ </button>
                                <span class="commenter-name">
                                 <span class="comment-time">{{comment.created_at}}</span>
                              </span>
                            </div>
                            <div class="comment-box add-comment reply-box" v-if="reply === comment.id">
                                <span class="commenter-name" v-if="authcheck">
                                  <textarea row="3" placeholder="پاسخ به ..." name="Add Comment" v-model="childComment" />
                                      <div class="w-100 text-right">
                                        <small class="text-danger" v-for="err in childerrors.comment">{{err}}</small>
                                      </div>
                                   <button type="submit" class="btn btn-sm btn-ok mt-2" @click.prevent="postChildComment()">ارسال</button>
                                </span>
                                <span class="commenter-name" v-if="!authcheck">
                                    برای ارسال نظر ابتدا وارد شوید
                                     <a href="/login" target="_blank" class="btn btn-sm btn-ok">ورود</a>
                                </span>
                            </div>



                            <div class="comment-box replied" v-for="childcomment in all.data" v-if="childcomment.parent_id == comment.id">
                                <div class="d-inline-flex align-items-center w-100">
                                    <img  :src="childcomment.user.profile_image" class="commenter-pic img-fluid">
                                    <span class="pr-2">
                                  {{childcomment.user.name}}
                              </span>
                                </div>
                                <p class="comment-txt more">
                                    {{childcomment.comment}}
                                </p>
                                <div class="comment-meta">
                                    <span class="comment-time w-100">{{childcomment.created_at}}</span>
                                </div>
                            </div>


                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>


</template>

<script>
    export default {
        name: "commentComponent",
        props: ['product', 'authcheck', 'authid'],
        data() {
            return {
                comment:'',
                childComment:'',
                parent_id:0,
                errors:{},
                childerrors:{},
                reply:0,
                all:{}
            }
        },
        mounted() {
            this.getComments(this.product)
        },
        methods: {
            comment_reply(id) {
                if (this.reply === id){
                    this.reply = 0
                }else {
                    this.reply = id
                }
            },
            getComments(id){
                axios.get("/api/"+id+"/comments")
                    .then(res =>{
                      this.all = res.data
                    }).catch(err =>{
                        console.log(err)
                })
            },
            postComment(){
                axios.post('/comment',{comment:this.comment , parent_id:this.parent_id ,product_id :this.product},{'Accept': 'application/json'})
                    .then(res =>{
                        console.log(res)
                        this.comment ='';
                        const Toast = this.$swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 4000,
                            timerProgressBar: true,
                            onOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })

                        Toast.fire({
                            icon: 'success',
                            title: 'با موفقیت ذخیره شد! و بعد از تایید قابل نمایش خواهد بود.'
                        })

                    }).catch(err =>{
                    if(err.response.status === 422) {
                        this.errors = err.response.data.errors
                    }else {
                        console.log(err.data)
                    }
                })
            },
            postChildComment(){
                axios.post('/child/comment',{comment:this.childComment , parent_id:this.reply ,product_id :this.product},{'Accept': 'application/json'})
                    .then(res =>{
                        this.childComment =""
                        this.reply=0
                        const Toast = this.$swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 4000,
                            timerProgressBar: true,
                            onOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })

                        Toast.fire({
                            icon: 'success',
                            title: 'با موفقیت ذخیره شد! و بعد از تایید قابل نمایش خواهد بود.'
                        })

                    }).catch(err =>{
                    if(err.response.status === 422) {
                        this.childerrors = err.response.data.errors
                    }else {
                        console.log(err.data)
                    }
                })
            }
        }
    }
</script>

<style scoped>
    .comments-details button.btn.dropdown-toggle,
    .comments-details .total-comments {
        font-size: 18px;
        font-weight: 500;
        color: #5e5e5e;
    }


    .comments .comment-box {
        width: 100%;
        float: left;
        height: 100%;
        background-color: #FAFAFA;
        padding: 10px 10px 10px;
        margin-bottom: 15px;
        border-radius: 5px;
        border: 1px solid #ddd;
    }

    .comments .add-comment {
        background-color: #f8f9fa;
        border: none;
        position: relative;
    }

    .comments .commenter-pic {
        width: 50px;
        height: 50px;
        float: right;
        display: inline-block;
        border-radius: 100%;
        border: 2px solid #fff;
        overflow: hidden;
        background-color: #fff;
    }

    .comments .add-comment .commenter-name {
        width: 100%;
    }

    .comments .add-comment input, .comments .add-comment textarea {
        border-top: 0px;
        border-bottom: 1px solid #ccc;
        background-color: #f8f9fa;
        border-left: 0px;
        border-right: 0px;
        outline: 0px;
        box-shadow: none;
        border-radius: 0;
        width: 100%;
        padding: 0;
        font-weight: normal;
    }

    .comments .add-comment input:focus {
        border-color: #03a9f4;
        border-width: 2px;
    }



    .comments .commenter-name .comment-time {
        font-weight: normal;
        margin-left: 8px;
        font-size: 15px;
    }

    .comments p.comment-txt {
        font-size: 15px;
        border-bottom: 1px solid #ddd;
        padding: 0px 0px 15px;
        text-align: right;
    }


    .comments .comment-meta {
        font-size: 14px;
        color: #333;
        display: flex;
        justify-content: space-between;
    }

    .comments .replied {
        background-color: #fff;
        width: 95%;
        margin-top: 15px;
    }


    /*======Responsive CSS=======*/
    @media (max-width: 767px) {
        .comments .commenter-name {
            font-size: 13px;
            top: -5px;
        }

        .comments .commenter-pic {
            width: 40px;
            height: 40px;
        }

        .comments .commenter-name a {
            display: block;
        }

        .comments .commenter-name .comment-time {
            display: block;
            margin-left: 0px;
        }
    }
</style>
