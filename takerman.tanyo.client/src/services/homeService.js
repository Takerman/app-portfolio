export default new class HomeService {
    async getNavLinks() {
        return await (await fetch('/Home/GetNavLinks')).json();
    }

    async getSocialLinks() {
        return await (await fetch('/Home/GetSocialLinks')).json();
    }

    async getFooterLinks() {
        return await (await fetch('/Home/GetFooterLinks')).json();
    }

    async getHighlights() {
        return await (await fetch('/Home/GetHighlights')).json();
    }

    async getSkills() {
        return await (await fetch('/Home/GetHighlights')).json();
    }

    async getCompanies() {
        return await (await fetch('/Home/GetCompanies')).json();
    }
}