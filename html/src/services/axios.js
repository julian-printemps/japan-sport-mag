import axios from 'axios'

let homeUrl = ''
if (process.env.NODE_ENV === 'production') {
    homeUrl = 'https://archive.the-concrete.org/'
} else {
    homeUrl = 'http://localhost:8888/'
}

let commonAxios = axios.create({
    baseURL: homeUrl
})

export default commonAxios
