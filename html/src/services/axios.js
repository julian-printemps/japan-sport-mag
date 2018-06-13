import axios from 'axios'

let homeUrl = ''
if (process.env.NODE_ENV === 'production') {
    homeUrl = 'http://www.japansportsmagazine.com/'
} else {
    homeUrl = 'http://localhost:8888/'
}

let commonAxios = axios.create({
    baseURL: homeUrl
})

export default commonAxios
