/* eslint-disable */
export const cssTemplate = '.card{margin-top:12px ;} .btn-primary {margin-top:12px ;}'
const loadMorebutton = '<button name="loadMore" class="btn btn-primary loadMore">載入更多</button>'


export function getLoadMoreButton(prefix) {
    return `<button name="loadMore" class="btn btn-primary ${prefix}-loadMore">載入更多</button>`
}

export function getForm(className, commentsClassName) {
    return `
    <div>
        <form class="${className}">
            <div class="form-group">
                <label>Nickname</label>
                <input class="form-control" name="nickname">
            </div>
            <div class="form-group">
                <label">Discussions</label>
                <textarea class="form-control" rows="3" name="content"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div class="${commentsClassName}"></div>
    </div>
    `
}