export default class CustomerService {

    getAllRole() {
        return fetch(route('permission.index')).then(res => res.json())
            .then(d => d.data);
    }

}