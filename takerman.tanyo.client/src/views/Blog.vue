<template>

<div class="section-margin">
    <section class="blog-area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main_title">
                        <p class="top_text">My blog <span></span></p>
                        <h2>
                            Latest Stories From <br>
                            My blog
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach (var blogItem in Model.BlogItemsMini)
                {
                    var link = Url.ActionLink("Post", "Blog", new { name = blogItem.Name });
                    <div class="col-lg-4 col-md-6" style="color: black;">
                        <div onclick="location.href='@link'" style="cursor: pointer;" class="single-blog">
                            <div class="thumb">
                                <!-- <img class="img-fluid blog-post-thumbnail" src="@blogItem.Image" alt=""> -->
                            </div>
                            <div class="short_details">
                                <div class="meta-top d-flex">
                                    <span><i class="ti-user"></i> blogItem.Author] | <i class="ti-calendar"></i> @blogItem.Date</span>
                                    @* .ToString("MMM dd, yyyy") *@
                                </div>
                                <a class="d-block" href="@link">
                                    <h4>blogItem.Title]</h4>
                                </a>
                                <div class="text-wrap">
                                    <p>
                                        blogItem.Content]
                                    </p>
                                </div>
                                <a href="@link" class="primary_btn2">Learn More</a>
                            </div>
                        </div>
                    </div>
                }
            </div>
            @if (Model.SeeAllVisible)
            {
                <div class="text-center">
                    <a href="/blog" class="primary_btn2">home-blog-see-all</a>
                </div>
            }
        </div>
    </section>
</div>
</template>

<script lang="js">
export default {
}
</script>

<style scoped></style>