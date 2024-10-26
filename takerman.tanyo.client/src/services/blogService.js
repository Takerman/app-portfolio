export default new class BlogService {
    async getBlogposts() {
        return await (await fetch('/Blog/GetBlogposts')).json();
    }
}