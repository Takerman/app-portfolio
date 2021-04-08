import axios from 'axios'
import axiosHelper from '@/api/axiosHelper'

const BASE_URI = '/api/blogposts/';

export default {
    searchBlogposts() {
        return axios
            .get(BASE_URI)
            .then(axiosHelper.handleQueryResponse);
    },

    getById(id) {
        return axios
            .get(BASE_URI + id)
            .then(axiosHelper.handleQueryResponse);
    },
}